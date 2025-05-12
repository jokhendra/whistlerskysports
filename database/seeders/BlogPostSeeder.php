<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get an admin user (or create one if none exists)
        $admin = Admin::first();
        
        if (!$admin) {
            // If no admin exists, we can't create blog posts
            $this->command->info('No admin user found. Please create an admin user first.');
            return;
        }
        
        // Create sample blog posts
        $posts = [
            [
                'title' => 'Getting Started with Paragliding',
                'excerpt' => 'Learn the basics of paragliding and how to get started with this exciting aerial sport.',
                'content' => '<p>Paragliding is one of the most accessible forms of human flight. With a few weeks of training, almost anyone can experience the joy of free flight.</p><h2>What is Paragliding?</h2><p>Paragliding is a recreational and competitive flying sport. A paraglider is a free-flying, foot-launched aircraft. The pilot sits in a harness suspended below a fabric wing, whose shape is formed by the pressure of air entering vents in the front of the wing.</p>',
                'category' => 'Beginner Guide',
                'tags' => ['paragliding', 'beginner', 'training', 'equipment'],
                'published' => true,
            ],
            [
                'title' => 'Advanced Thermaling Techniques',
                'excerpt' => 'Master the art of catching and riding thermals to extend your flight time and increase altitude.',
                'content' => '<p>Thermaling is the art of finding and staying in rising air currents to gain altitude. This technique is essential for cross-country flying and can dramatically extend your flight time.</p><h2>Understanding Thermals</h2><p>Thermals are columns of rising air formed when the sun heats the ground, which in turn heats the air above it. Different surfaces absorb and release heat at different rates.</p>',
                'category' => 'Advanced Techniques',
                'tags' => ['thermals', 'advanced', 'flying techniques', 'cross-country'],
                'published' => true,
            ],
            [
                'title' => 'Weather Patterns Every Pilot Should Understand',
                'excerpt' => 'Essential meteorological knowledge for safe and enjoyable flights.',
                'content' => '<p>Understanding weather patterns is crucial for paraglider pilots. Weather knowledge can mean the difference between an amazing flight and a dangerous situation.</p><h2>Stability and Instability</h2><p>Air stability greatly affects flying conditions.</p>',
                'category' => 'Safety',
                'tags' => ['weather', 'safety', 'meteorology', 'flying conditions'],
                'published' => true,
            ],
        ];
        
        foreach ($posts as $post) {
            BlogPost::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'excerpt' => $post['excerpt'],
                'content' => $post['content'],
                'category' => $post['category'],
                'tags' => $post['tags'],
                'published' => $post['published'],
                'published_at' => now(),
                'admin_id' => $admin->id,
                'view_count' => rand(5, 100),
            ]);
        }
        
        $this->command->info('Created ' . count($posts) . ' sample blog posts.');
    }
}
