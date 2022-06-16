<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tattoo;
use App\Models\TattoosCategory;
class TattoosController extends Controller
{
    public function index(){

        $tattoos = Tattoo::all();
        return view('tattoos.index', compact('tattoos'));
    }

    public function add(){
        
        return view('tattoos.add');
    }
}
