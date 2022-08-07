<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        
        $path_url = 'storage/photos';

        if ($request->hasFile('image')) {
                // Get filename with extention 
                $filenamewithExt = $request->file('image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                // Get just Extention
                $extention = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extention;
                // Upload Image
                $path = $request->file('image')->move($path_url, $filenameToStore);


                $url = asset($path_url . '/' . $filenameToStore);

                return response()->json([ 'url' => $url]);
                // return response()->json(['filenameToStore' => $filenameToStore, 'uploaded' => 1, 'url' => $url  ]);

            }
    }
}
