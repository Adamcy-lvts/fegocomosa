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

// Define an Artisan command named 'inspire'
Artisan::command('inspire', function () {
    // Output an inspiring quote using the Inspiring class and display it as a comment
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Define another Artisan command named 'clear:tmp'
Artisan::command('clear:tmp', function () {
    // Display an informational message
    $this->info('Clearing the tmp folder...');

    // Get the list of contents (files and directories) in the 'tmp' folder of the 'public' disk
    $files = Storage::disk('public')->listContents('tmp');

    // Filter the list of files based on specific conditions
    $numberImages = collect($files)->filter(function($file) {
        // Check if the item is a file and if its timestamp is older than 5 days ago
        return $file['type'] == 'file' && $file['timestamp'] < now()->subDays(5)->getTimestamp();
    })->each(function($file) {
        // For each filtered file, delete it from the 'public' disk
        Storage::disk('public')->delete($file['path']);
    })->count(); // Count the number of deleted images

    // Output an informational message indicating the number of deleted images
    $this->info($numberImages . ' ' . 'Images have been deleted');
})->purpose('Clear temporary images in the tmp folder');
