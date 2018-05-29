<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use \App\Upload;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	$upload=new Upload;
        $disk = Storage::disk('gcs');
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $disk->put($file->getFilename().'.'.$extension, File::get($file));
        $upload->size=File::size($file);
       	$upload->mime=$file->getClientMimeType();
     	$upload->image=$file->getFilename().'.'.$extension;
        $upload->save();
        return 'Success upload';
    }
}

