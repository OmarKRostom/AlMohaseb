<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use Form;
use Auth;

class HomeController extends Controller
{
    public function index() {
    	return view('login');
    }

    public function login() {
    	if(Auth::attempt(['username' => request()->username, 'password' => request()->password])) {
    		return redirect()->to("/admin/dashboard");
    	} else {
    		$errors = ['authError' => 'Incorrect username or password'];
    		return view('login')->withErrors($errors);
    	}
    }

    public function home() {
    	return view("admin.dashboard");
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->to("/");
    }
}
