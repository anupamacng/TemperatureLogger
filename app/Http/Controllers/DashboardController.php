<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $user = Auth::user();
        $temperatureDataColombo = $this->arrangeData($user->temperatures->where('town', 'Colombo'));
        $temperatureDataMelbourne = $this->arrangeData($user->temperatures->where('town', 'Melbourne'));
        $towns = ['Colombo', 'Melbourne'];
        $baby ="chanu";
        return Inertia::render('Dashboard', [
            'temperatureDataColombo' => $temperatureDataColombo , 'temperatureDataMelbourne' => $temperatureDataMelbourne , 'towns' => $towns , 'baby' => $baby
        ]);
    }
    
    /**
     * 
     *
     * @param  Collection
     * @return Array
     */
    private function arrangeData($tempData){
        $data = [];
        foreach($tempData as $value){
            $a = [
                'town' => $value->town,
                'time' => date_format(date_create($value->created_at),"D, t F Y, H:i:s a"),
                'tempC' =>  $value->temperature . " C",
                'tempF' => ($value->temperature * 9/5) + 32 . " F", 
            ];
            $data[] = $a;
             
        }
        return $data;
    }
    
}
