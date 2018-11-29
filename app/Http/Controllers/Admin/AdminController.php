<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //

    public function index(){
        return view('Admin.Home.index');
    }

    public function novo(){
        return view('Portal.Evento.formCad');
    }
}
