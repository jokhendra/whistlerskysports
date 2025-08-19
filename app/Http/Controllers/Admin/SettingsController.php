<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        // Ensure default settings exist for all fields
        $this->ensureDefaultSettings();
        
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'pinterest_url' => 'nullable|url',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'google_calendar_id' => 'nullable|string',
            'google_spreadsheet_id' => 'nullable|string',
        ]);

        foreach ($request->except(['_token', 'site_logo']) as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if ($request->hasFile('site_logo')) {
            $request->validate([
                'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Delete old logo if exists
            $oldLogo = Setting::where('key', 'site_logo')->first();
            if ($oldLogo && $oldLogo->value) {
                Storage::disk('s3')->delete($oldLogo->value);
            }

            // Store new logo
            $file = $request->file('site_logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'settings/logo/' . $filename;
            
            // Upload file without ACL
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $filePath]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }

    /**
     * Ensure all default settings exist in the database
     */
    private function ensureDefaultSettings()
    {
        $defaultSettings = [
            'facebook_url' => '',
            'twitter_url' => '',
            'instagram_url' => '',
            'linkedin_url' => '',
            'youtube_url' => '',
            'pinterest_url' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'google_calendar_id' => '',
            'google_spreadsheet_id' => '',
        ];
        
        foreach ($defaultSettings as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
} 