<?php

class WeatherService
{
    private HttpClient $client;

    private array $config;

    public function __construct()
    {
        $this->client = new HttpClient();

        $this->config = require __DIR__ . "/../config/config.php";
    }

    public function currentWeather(string $city)
    {
        $url =
            $this->config["base_url"] .
            "/current.json?key=" .
            $this->config["weather_api_key"] .
            "&q=" .
            urlencode($city);

        $response = $this->client->get($url);

        return json_decode(
            $response["body"],
            true
        );
    }
}