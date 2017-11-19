<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class GitFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gitfetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command do git fetch remote and hard reset to origin/master';

    
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('== Start git fetch');
        
        echo exec('git fetch --all && git reset --hard origin/master');
        
        echo PHP_EOL;
        
        $this->info('== Complete. Have a nice deploy :)');
    }
}
