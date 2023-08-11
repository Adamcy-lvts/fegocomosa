<?php

namespace App\Http\Controllers;

// use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class DownloadResumeController extends Controller
{
    public function __invoke($id)
    {
        
       $member = User::find($id);
    
       $html =  view('profile.download-resume', [
        'member' => $member
       ])->render();

        $file = $member->first_name.'_'.'resume.pdf';

        Browsershot::html($html)->setChromePath('/usr/bin/google-chrome')->showBackground()->format('A4')->save(storage_path("app/pdf/{$member->first_name}_{$member->id}_resume.pdf"));
      
        $path = storage_path("app/pdf/{$member->first_name}_{$member->id}_resume.pdf");

        return response()->download($path)->deleteFileAfterSend(true);
      
        
    }

    
}
