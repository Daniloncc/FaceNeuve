<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $quebecCities = [
            'Blainville' => 'BLA',
            'Boucherville' => 'BOU',
            'Brossard' => 'BRO',
            'Châteauguay' => 'CHA',
            'Dollard-des-Ormeaux' => 'DDO',
            'Laval' => 'LAV',
            'Longueuil' => 'LON',
            'Mirabel' => 'MIR',
            'Montréal' => 'MTL',
            'Repentigny' => 'REP',
            'Saint-Constant' => 'SCO',
            'Saint-Eustache' => 'SEU',
            'Saint-Jean-sur-Richelieu' => 'SJR',
            'Saint-Jérôme' => 'SJE',
            'Terrebonne' => 'TER'
        ];

        $city = $this->faker->randomElement(array_keys($quebecCities));

        return [
            'city' => $city,
            'abreviation' => $quebecCities[$city]
        ];
    }
}
