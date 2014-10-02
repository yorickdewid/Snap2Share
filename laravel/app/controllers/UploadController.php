<?php

class UploadController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function ShowDone()
	{
				return View::make('uploadedfile');
	}
	
	public function Process()
	{
				$request = Request::instance();
				$request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
				$ip = $request->getClientIp();
				
				$destinationPath = 'gfuploads';
				$file = Input::file('mfile');
				$extension = $file->getClientOriginalExtension(); 
				$filename = str_random(20).".".$extension;
				$filenameorg = $file->getClientOriginalName();
				
				$mimetype = Input::file('mfile')->getMimeType();
				if($mimetype != "image/png" && $mimetype != "image/gif" && $mimetype != "image/jpeg" && $mimetype != "image/pjpeg"){
					return View::make('uploadform')->with('error', 1);
				}
				
				
				$upload_success = Input::file('mfile')->move($destinationPath, $filename);
			
				Mfile::create(array('orgfilename' => $filenameorg, 'orgextension' => $extension, 'filename' => $filename, 'mimetype' => $mimetype, 'remote_ip' => $ip, 'hits' => 0));
				return View::make('uploadedfile')->with('orgfilename', $filenameorg)->with('filename', $filename);
	}
	
	public function ShowFile($filename)
	{
		$filen = DB::table('files')->where('filename', $filename)->get();
		return View::make('showfile')->with('filename', $filen[0]->filename)->with('hits', $filen[0]->hits);
	}
	
	public function RawFile($filename){
		$filen = DB::table('files')->where('filename', $filename)->get();
		if(empty($filen)){
			App::abort('404');
		}
		DB::table('files')->where('filename', $filename)->increment('hits');
					 
		$path = "gfuploads/" . $filename;

		// Initialize an instance of Symfony's File class.
		// This is a dependency of Laravel so it is readily available.
		$file = new Symfony\Component\HttpFoundation\File\File($path);

		// Make a new response out of the contents of the file
		// Set the response status code to 200 OK
		$response = Response::make(
			File::get($path), 
			200
		);

		// Modify our output's header.
		// Set the content type to the mime of the file.
		// In the case of a .jpeg this would be image/jpeg
		$response->header(
			'Content-type',
			$filen[0]->mimetype
		);

		// We return our image here.
		return $response;
			 
			 
			 
		
	}

	public function apiupload(){
	
		if (Request::isMethod('get')){
			return Response::json(array("Error" => "You need to post to the API"));
			exit();
		}
	
				
				
				$request = Request::instance();
				$request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
				$ip = $request->getClientIp();
				
				$destinationPath = 'gfuploads';
				$file = Input::file('mfile');
				$extension = $file->getClientOriginalExtension(); 
				$filename = str_random(20).".".$extension;
				$filenameorg = $file->getClientOriginalName();
				
				$mimetype = Input::file('mfile')->getMimeType();
				if($mimetype != "image/png" && $mimetype != "image/gif" && $mimetype != "image/jpeg" && $mimetype != "image/pjpeg"){
					return View::make('uploadform')->with('error', 1);
					return Response::json(array("Error" => "You can only upload files with MIMETypes : image/png, image/gif, image/jpeg & image/pjpeg"));
				}
				
				
				$upload_success = Input::file('mfile')->move($destinationPath, $filename);
			
				Mfile::create(array('orgfilename' => $filenameorg, 'orgextension' => $extension, 'filename' => $filename, 'mimetype' => $mimetype, 'remote_ip' => $ip, 'hits' => 0));
		
				return Response::json(array('Bericht' => "http://www.snap2share.eu/file/".$filename));
				
				
	}
	
}
