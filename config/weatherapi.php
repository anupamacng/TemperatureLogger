<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


/**
 * Wether API parameters
 *
 * @author anupama
 */
return  [
            "exclude" => 'hourly,minutely,daily',
            "appid" => env("OPEN_WEATHER_APPID"),
            'units' => 'metric',
        ];