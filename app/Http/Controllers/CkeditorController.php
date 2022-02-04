<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            $result = $request->file('upload')->move('storage/post_images', $filenametostore);
            $json = [];
            if ($result) {
                $url = asset('storage/post_images/' . $filenametostore);
                $json['uploaded'] = true;
                $json['url'] = $url;
                @header('Content-type: text/html; charset=utf-8');
                echo json_encode($json);
            } else {
                $json["uploaded"] = false;
                $json["error"] = array("message" => "Error Uploaded");
                echo json_encode($json);
            }
        }
    }
}
