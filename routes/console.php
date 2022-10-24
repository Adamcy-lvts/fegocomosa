<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('clear:tmp', function () {
    $this->info('Clearing the tmp folder...');

    $files = Storage::disk('public')->listContents('tmp');

   $numberImages = collect($files)->filter(function($file) {
        return $file['type'] == 'file' && $file['timestamp'] < now()->subDays(5)->getTimestamp();
    })->each(function($file) {
        Storage::disk('public')->delete($file['path']);
    })->count();
     $this->info($numberImages .' '.'Images have been deleted');
})->purpose('Clear temporary images in the tmp folder');