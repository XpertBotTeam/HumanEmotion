<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\VisionClient;
use Illuminate\Support\Facades\Storage;

class CheckController extends Controller
{
    public function check()
    {
        //session_start();
        //require_once 'vendor/autoload.php';

        //link the google api key
        //$vision = new VisionClient(['keyFile' => json_decode(file_get_contents(public_path('key.json')),true)]);
        //echo __DIR__;  current dir

        $vision = new VisionClient();
        //get the uploaded image
        $familyPhotoResource = fopen($_FILES['image']['tmp_name'],'r');
        $image = $vision->image($familyPhotoResource,['FACE_DETECTION','WEB_DETECTION']);
        $annotation = $vision->annotate($image);
        $faces = $annotation->faces();
        $face = $faces[0];
        $feeling ='';
        if ($face->isSorrowful()){
            $feeling = "Is Sad";
        }elseif($face->isJoyFul()){
            $feeling = "Is Happy";
        }elseif($face->isAngry()){
            $feeling = "Is Angry";
        }
        else{
            $feeling = "Not detected";
        }

        $imageToken = random_int(1111111,99999999);
        move_uploaded_file($_FILES['image']['tmp_name'],public_path("/uploads/".$imageToken.".jpg"));    
        return view('check',[
            'feeling'=>$feeling,
            'imageToken'=>$imageToken
        ]);

    }
}
