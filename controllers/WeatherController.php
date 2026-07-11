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
        $error = null;

        if (isset($_GET["city"]))
        {
            try{
                $weather = $this->service->currentWeather(
                    $_GET["city"]
                );
            }
            catch(Exception  $e)
            {
                $error = $e->getMessage();

            }
        }

        require __DIR__ . "/../views/weather.php";
    }
}