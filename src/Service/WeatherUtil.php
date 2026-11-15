<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Location;
use App\Entity\Measurement;

class WeatherUtil
{
    /**
     * @return Measurement[]
     */
    public function getWeatherForLocation(Location $location): array
    {
        return [];
    }

    /**
     * @return Measurement[]
     */
    public function getWeatherForCountryAndCity(string $countryCode, string $city): array
    {
        return [];
    }
}
