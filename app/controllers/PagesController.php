<?php

// AC/DC => Rock or Bust => Dogs or War..

namespace App\Controllers;

class PagesController {

	public function home() {

		// Receive a Request.
		// Delegate.
		// Return a Response.

		return view('index');

	}

	public function about() {

		$company = 'Elmob';

		return view('about', [
				'company' => $company,
			]);
	}

	public function contact() {

		return view('contact');
	}
}