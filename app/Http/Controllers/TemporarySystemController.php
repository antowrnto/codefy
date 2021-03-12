<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;

class TemporarySystemController extends Controller
{
    public function __construct()
    {
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
          $file = $request->file('thumbnail');
          $name = $file->getClientOriginalName();
          $folder = 'temp/' . uniqid() . '-' . now()->timestamp;
          Storage::disk('dropbox')->putFileAs($folder, $file, $name);
          $this->dropbox->createSharedLinkWithSettings($folder . '/' . $name);
          $link = $this->dropbox->listSharedLinks($folder . '/' . $name);
          
          TemporaryFile::create([
              'folder_name' => $folder,
              'file_name' => $name,
              'file_link' => $link[0]['url'],
          ]);
          
          return $folder;
        }
        
      return '';
    }
}
