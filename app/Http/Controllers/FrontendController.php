<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class FrontendController extends Controller
{
    public function index(){
    $biodata = DB::table('biodatas')
    ->get();
            
    return view('index',[


            'title'=>$title,
            'description'=>$description,
            'image'=>$image,
        ]);
    }
}
