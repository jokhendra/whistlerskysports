<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupCartSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the cart system with migrations and seed data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up cart system...');
        
        $this->info('Running migrations...');
        Artisan::call('migrate');
        $this->info(Artisan::output());
        
        $this->info('Seeding products...');
        Artisan::call('db:seed', ['--class' => 'ProductSeeder']);
        $this->info(Artisan::output());
        
        $this->info('Cart system setup complete!');
        $this->info('You can now use the cart functionality.');
        
        return 0;
    }
} 