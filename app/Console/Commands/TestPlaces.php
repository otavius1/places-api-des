<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestPlaces extends Command
{
    protected $signature = 'test:places';
    protected $description = 'Run place-related API tests in order of priority';

    public function handle()
    {
        $this->info('Running Place API tests...');
        $this->call('test', ['--filter' => 'PlaceApiTest']);
    }
}
