<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scenario;

class ScenarioController extends Controller
{
    //
    function index()
    {
        return Scenario::all();
    }
}
