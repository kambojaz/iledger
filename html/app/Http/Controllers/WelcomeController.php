<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Merlion;

use App\Catalog;
use App\Product;
use App\Image;
use Excel;
use Storage;

class WelcomeController extends Controller
{
    
    public function index() {

        return view('welcome');
    }
    
    public function create() {

    	return view('create');
    }


}
