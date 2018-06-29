<?php

namespace App\Http\Controllers;

use App\Record;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $range = [
      '0'  => 'Very severely underweight',
      '15' => 'Severely underweight',
      '16' => 'Underweight',
      '18' => 'Normal (healthy weight)',
      '25' => 'Overweight',
      '30' => 'Obese Class I (Moderately obese)',
      '35' => 'Obese Class II (Severely obese)',
      '40' => 'Obese Class III (Very severely obese)',
      '45' => 'Obese Class IV (Morbidly Obese)',
      '50' => 'Obese Class V (Super Obese)',
      '60' => 'Obese Class VI (Hyper Obese)'
    ];
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
        return view('calculator');
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

      $BMI = $request->weight / pow($request->height / 100,2);
      $range = $this->getRange($BMI);

      return response()->view('calculator',[
        'status' => true,
        'BMI'    => $BMI,
        'range'  => $range
      ],200);

      return response()->json($request);
    }

    public function getRange($BMI)
    {
      $range = '';
      foreach ($this->range as $index => $text) {
        if( $index > $BMI && $BMI ) {
          return $range;
        } else {
          $range = $text;
        }
      }
    }
}
