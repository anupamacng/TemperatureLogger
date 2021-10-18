<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Services;
use App\Services\TemperaturedataProvider;

/**
 * Description of ApiFactory
 *
 * @author anupama
 */
class ApiFactory {
    //put your code here
    
    /**
     * Return API
     *
     * @param  String $type
     * @return App\Services\InterfaceApiProvider
     */
    public static function getApiFactory($type)
    {
        if($type == "weatherapi")
        {
            return new TemperaturedataProvider(env("OPEN_WEATHER_URL"));
        }
        
    }
}
