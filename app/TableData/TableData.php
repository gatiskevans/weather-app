<?php

    namespace App\TableData;

    class TableData
    {
        private \stdClass $data;

        public function __construct(\stdClass $data)
        {
            $this->data = $data;
        }

        public function getRegion(): string
        {
            return $this->data->location->region;
        }

        public function getCountry(): string
        {
            return $this->data->location->country;
        }

        public function getLocalTime(): string
        {
            return $this->data->location->localtime;
        }

        public function getLatitude(): string
        {
            return $this->data->location->lat;
        }

        public function getLongitude(): string
        {
            return $this->data->location->lon;
        }

        public function getTemperature(): string
        {
            return $this->data->current->temp_c;
        }

        public function getForecastDays()
        {
            return $this->data->forecast->forecastday;
        }
    }