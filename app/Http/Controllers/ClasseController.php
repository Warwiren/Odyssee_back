<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;


class ClasseController extends Controller
{
    //
    function index()
    {
        return Classe::all();
    }
}
