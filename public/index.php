<?php

require "../core/HttpClient.php";

require "../services/WeatherService.php";

require "../controllers/WeatherController.php";

$controller = new WeatherController();

$controller->index();