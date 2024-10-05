<?php

namespace App\Console\Commands;

use App\Models\City;
use Http;
use Illuminate\Console\Command;

class ParseCities extends Command
{
    protected $signature = 'app:parse-cities';
    protected $description = 'Parse and save cities from HH API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

$response = file_get_contents('https://api.hh.ru/areas', false, $context);

        $response = json_decode($response, true);

        $areas = $response;

        $russianCities = collect($areas[0]['areas']);

        foreach ($russianCities as $region) {
            foreach ($region['areas'] as $city) {
                City::updateOrCreate(
                    ['slug' => $this->generateSlug($city['name'])],
                    ['name' => $city['name']]
                );
            }
        }

        $this->info('Cities parsed and saved.');
    }

    private function generateSlug($name)
    {
        return strtolower(preg_replace('/\s+/', '-', $name));
    }
}
