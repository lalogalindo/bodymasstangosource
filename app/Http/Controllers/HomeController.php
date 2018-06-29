<?php

namespace App\Http\Controllers;

use App\Record;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function records(\App\User $user)
    {
        return view('records', compact('user'));
    }

    public function newRecord(Request $request)
    {
      $user = Auth::user();
      $record = new \App\Record;
      $record->kilograms = $request->weight;
      $record->centimeters = $request->height;

      $user->records()->save($record);

      return response()->view('calculator',[
        'status' => true,
        'BMI' => $request->weight / pow($request->height / 100,2)
      ],200);

      return response()->json($request);
    }

    public function calculator()
    {
        return view('calculator');
    }
}
