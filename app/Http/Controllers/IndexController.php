<?php

namespace App\Http\Controllers;
use App\Models\encadrant;
use App\Models\stagiaires;
use App\Models\sujet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
{
    $totalStagiaires = stagiaires::count();
    $encadrantCount = encadrant::count();
    $sujetCount = sujet::count();
    
    return view('index', compact('totalStagiaires', 'encadrantCount', 'sujetCount'));
}

}
