<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ProjectSetupCommand extends Command
{
    protected $signature = 'project:setup';

    protected $description = 'Setup Install And Run The Whole Project With One Command';

    public function handle()
    {
        $this->info('Generating App Key...');
        $this->call('key:generate');

        $this->info('Running Migrations...');
        $this->call('migrate');

        $this->info('Seeding The Database...');
        $this->call('db:seed');

        $this->info('✅ Project Setup Completed');
    }
}
