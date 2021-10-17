<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Temperature;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Services\TemperaturedataService;

class AuthenticatedSessionController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create() {
        return Inertia::render('Auth/Login', [
                    'canResetPassword' => Route::has('password.request'),
                    'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        $this->logTemperature();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Insert Town Temperature.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function logTemperature() {
        // exclude data for weather API
        // Units in metric means Celcius temperature
        $parameters = [
            "exclude" => 'hourly,minutely,daily',
            "appid" => env("OPEN_WEATHER_APPID"),
            'units' => 'metric'
        ];
        $tempDataService = new TemperaturedataService(env("OPEN_WEATHER_URL"));
        foreach ($parameters as $k => $v) {
            $tempDataService->setParameter($k, $v);
        }
        $arrTemperature = [];
        $townData = [
            "Colombo" => ['town_id' => 1,
                'lat' => '6.927079',
                'lon' => '79.861244'],
            "Melbourne" => ['town_id' => 2,
                "lat" => '-37.813629',
                "lon" => '144.963058'],
        ];

        if ($townData) {
            foreach ($townData as $key => $value) {
                $temperatureData = $tempDataService->fetch($value);
                if ($temperatureData) {
                    if ($temperatureData->current->temp) {
                        $arrTemperature[] = new Temperature([
                            "town_id" => $value['town_id'],
                            "town" => $key,
                            "temperature" => $temperatureData->current->temp
                        ]);
                    }
                }
            }
        }
        if (count($arrTemperature) > 0) {
            Auth::user()->temperatures()->saveMany($arrTemperature);
        }
    }

}
