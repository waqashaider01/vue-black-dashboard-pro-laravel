<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Reseed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reseeds the image folders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        File::copy( storage_path('app/public/pictures-seed/admin.jpg'), storage_path('app/public/pictures/admin.jpg'));
        File::copy(storage_path('app/public/pictures-seed/creator.jpg'), storage_path('app/public/pictures/creator.jpg'));
        File::copy(storage_path('app/public/pictures-seed/member.jpg'), storage_path('app/public/pictures/member.jpg'));
    }
}
