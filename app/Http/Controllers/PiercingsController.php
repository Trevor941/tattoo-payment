<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piercing;
class PiercingsController extends Controller
{
    public function index(){
        $piercings = Piercing::all();
        return view('piercings.index', compact('piercings'));
    }

    public function add(){
        
        return view('piercings.add');
    }
}
