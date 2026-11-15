<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Location;
use App\Entity\Measurement;
use App\Repository\MeasurementRepository;

class WeatherUtil
{
    //plik wzbodzacony przez ai
    public function __construct(
        private MeasurementRepository $measurementRepository
    ) {}

    public function getWeatherForLocation(Location $location): array
    {
        return $this->measurementRepository->findByLocation($location);
    }

    public function getWeatherForCountryAndCity(string $city, ?string $countryCode = null): array
    {
        return $this->measurementRepository->findByCityAndCountry($city, $countryCode);
    }
}
