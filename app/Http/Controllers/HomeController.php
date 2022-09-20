<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return('home');
    }

    public function show($name)
    {

        //return view('show', compact('name'));
        return view('show', ['name'=> $name]);
    }
    public function form()
    {
        return view('form');
    }
}
