<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use App\Service\WeatherUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{name}/{country}', name: 'app_weather_country')]
    #[Route('/weather/{name}', name: 'app_weather')]

    public function city(string $name, LocationRepository $locationRepository, WeatherUtil $util, ?string $country = null
    ): Response {

        //nie wiedziałam jak zrobić tak albo county było opcjonale więc ten kawałek kodu jest wzbogacony przez ai
        $criteria = ['Name' => $name];

        $location = $locationRepository->findOneBy($criteria); //findbyone magia zeby country bylo opcjonalne (na poczatek szukamy po name i patrzymy czy ktos podal country jesli tak to dokladamy to do szukania a jak nie to szukamy po samym name jupi)

        if ($country !== null) {
            $criteria['Country'] = strtoupper($country); //strtoupper jak ktos wpisze male literki to zamieni sie na duze
            $measurements = $util->getWeatherForCountryAndCity($name, $country);
        }
        else{
            $measurements = $util->getWeatherForLocation($location);
        }

        //

        if ($location === null) {
            throw $this->createNotFoundException(
                'No location found for name ' . $name
            );
        }



        return $this->render('weather/name.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);
    }
}
