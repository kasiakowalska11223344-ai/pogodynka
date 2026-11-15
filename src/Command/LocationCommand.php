<?php

namespace App\Command;

use App\Repository\LocationRepository;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'location',
    description: 'Find location by name and country',
)]
class LocationCommand
{
    public function __construct(
        private readonly LocationRepository $locationRepository
    ) {}

    public function __invoke(
        SymfonyStyle $io,
        #[Argument('Location Name')] string $name,
        #[Argument('Location Country')] string $country = '',
    ): int {

        $criteria = ['Name' => $name];

        if ($country !== '') {
            $criteria['Country'] = strtoupper($country);
        }

        $location = $this->locationRepository->findOneBy($criteria);

        if ($location === null) {
            $io->error('No location found for name ' . $name);
            return Command::FAILURE;
        }

        $io->table(
            ['ID', 'Country', 'Name', 'Latitude', 'Longitude'],
            [[
                $location->getId(),
                $location->getCountry(),
                $location->getName(),
                $location->getLatitude(),
                $location->getLongtitude()
            ]]
        );

        return Command::SUCCESS;
    }
}
