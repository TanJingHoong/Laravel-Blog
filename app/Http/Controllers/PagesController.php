<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
	public function getIndex()
	{	//automatic select *
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);

	}

	public function getAbout()
	{	
		$first = 'Alex';
		$last = 'Curtis';

		$full = $first . " " . $last;
		$email = 'alex@jacurtis.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $full;
		return view('pages.about')->withData($data);
		// passing data("name call in view,variable to be pass in")
		// or withFullname($full);

	}

	public function getContact()
	{
		return view('pages.contact');
	}

	public function postContact(Request $request)
	{
		$this->validate($request,[
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
 			);

		Mail::send('emails.contact',$data,function($message)use($data){
			$message->from($data['email']);
			$message->to('jinghoong@mexwell.co');
			$message->subject($data['subject']);
		});

		Session::flash('success','Your Email was Sent!');

		return redirect('/');
	}

}