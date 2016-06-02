<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as request1;

use App\Http\Requests as request2;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Request as request3;
use Response;

class UploadController extends Controller {

    public function index() {
        return view('uploads');
    }

    public function uploadFiles() {

        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = Request::all();

        // VALIDATION RULES
        $rules = array(
            'file' => 'image|max:3000',
        );

       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $validation = Validator::make($input, $rules);

        // CHECK GIVEN DATA IS VALID OR NOT
        if ($validation->fails()) {
            return Redirect::to('/')->with('message', $validation->errors->first());
        }


           $file = array_get($input,'file');
           // SET UPLOAD PATH
            $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = rand(11111, 99999) . '.' . $extension;
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $upload_success = $file->move($destinationPath, $fileName);

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {
            return \Redirect::to('/')->with('message', 'Image uploaded successfully');
        }
    }

}