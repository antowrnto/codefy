<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;

class TemporarySystemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('thumbnail-image')) {
          $file = $request->file('thumbnail-image');
          $name = $file->getClientOriginalName();
          $folder = 'temp/' . uniqid() . '-' . now()->timestamp;
          Storage::putFileAs($folder, $file, $name);
          $link = Storage::url($folder . '/' . $name);
          
          TemporaryFile::create([
              'folder_name' => $folder,
              'file_name' => $name,
              'file_link' => $link,
          ]);
          
          return $folder;
        }
        
      return '';
    }
}
