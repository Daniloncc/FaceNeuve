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
            'Montréal' => 'MTL',
            'Laval' => 'LAV',
            'Longueuil' => 'LON',
            'Terrebonne' => 'TER',
            'Repentigny' => 'REP',
            'Boucherville' => 'BOU',
            'Saint-Jérôme' => 'SJE',
            'Châteauguay' => 'CHA',
            'Saint-Jean-sur-Richelieu' => 'SJR',
            'Dollard-des-Ormeaux' => 'DDO',
            'Saint-Eustache' => 'SEU',
            'Saint-Constant' => 'SCO',
            'Blainville' => 'BLA',
            'Mirabel' => 'MIR',
            'Brossard' => 'BRO'
        ];

        $city = $this->faker->randomElement(array_keys($quebecCities));

        return [
            'city' => $city,
            'abreviation' => $quebecCities[$city]
        ];
    }
}
