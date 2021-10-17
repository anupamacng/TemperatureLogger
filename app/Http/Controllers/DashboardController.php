<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Temperature;
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
        
        $temperature = new Temperature;
        $user = Auth::user();
        $temperatureData = $this->arrangeData($user->temperatures->all());
        $towns = ['Colombo', 'Melbourne'];
        return Inertia::render('Dashboard', [
            'temperatureData' , 'towns'
        ]);
    }
    
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    private function arrangeData($tempData){
        $data = [];
        foreach($tempData as $value){
            $a = [
                'town' => $value->town,
                'time' => date_format(date_create($value->created_at),"D, t F Y, H:i:s a"),
                'tempC' =>  $value->temperature,
                'tempF' => ($value->temperature * 9/5) + 32,
            ];
            $data[] = $a;
        }
        
    }
    
}
