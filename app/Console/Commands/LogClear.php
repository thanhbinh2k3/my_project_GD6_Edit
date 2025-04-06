<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class LogClear extends Command
{
    protected $signature = 'log:clear';
    protected $description = 'Xóa tất cả các file log trong storage/logs';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        File::cleanDirectory(storage_path('logs'));
        $this->info('Tất cả file log đã được xóa.');
    }
}
