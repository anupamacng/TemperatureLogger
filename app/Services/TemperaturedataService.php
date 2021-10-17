<?php

namespace App\Services;

use App\Models\Temperature;
use Illuminate\Support\Facades\Http;

class TemperaturedataService {

    protected $requiredParameters = [];
    protected $serviceURL;

    /**
     * Constructor
     *
     * @Param String $serviceUrl
     */
    function __construct($serviceUrl) {
        $this->serviceURL = $serviceUrl;
    }

    /**
     * Function to set required parameter.
     * @param String $key
     * @param String $value
     */
    public function setParameter($key, $value) {
        $this->requiredParameters[$key] = $value;
    }

    /**
     * Function to call weatherAPI .
     * @param Array $townData
     * @param Collection 
     */
    public function fetch($townData) {
        $apiParams = $this->requiredParameters + $townData;
        $response = Http::get($this->serviceURL, $apiParams);
        $temperatureData = json_decode($response->body());
        return $temperatureData;
    }

}
