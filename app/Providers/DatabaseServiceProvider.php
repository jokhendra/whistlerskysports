<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Exception;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            DB::connection()->getPdo();
            $dbName = DB::connection()->getDatabaseName();
            echo "\033[32mDatabase Connected Successfully! Database Name: ".$dbName."\033[0m\n";
        } catch (Exception $e) {
            echo "\033[31mDatabase Connection Failed! Error: ".$e->getMessage()."\033[0m\n";
        }
    }
}
