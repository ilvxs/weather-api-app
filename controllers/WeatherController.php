<?php

class WeatherController
{
    private WeatherService $service;

    public function __construct()
    {
        $this->service = new WeatherService();
    }

    public function index()
    {
        $weather = null;

        if (isset($_GET["city"]))
        {
            $weather = $this->service->currentWeather(
                $_GET["city"]
            );
        }

        require __DIR__ . "/../views/weather.php";
    }
}