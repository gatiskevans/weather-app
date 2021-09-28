<?php

    namespace App;

    class WeatherAPI
    {
        private string $apiKey;
        private \stdClass $weatherData;

        public function __construct(string $location = "Riga", int $days = 7)
        {
            $this->apiKey = "b41604c4b39f44348a382621212809";
            $apiUrl = "https://api.weatherapi.com/v1/forecast.json?key={$this->apiKey}&q={$location}&days={$days}&aqi=no&alerts=no";
            $this->weatherData = json_decode(file_get_contents($apiUrl, true));
        }

        public function getWeatherData()
        {
            return $this->weatherData;
        }
    }