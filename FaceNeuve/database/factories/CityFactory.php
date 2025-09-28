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
            'Québec' => 'QUE',
            'Laval' => 'LAV',
            'Gatineau' => 'GAT',
            'Longueuil' => 'LON',
            'Sherbrooke' => 'SHE',
            'Saguenay' => 'SAG',
            'Trois-Rivières' => 'TRI',
            'Terrebonne' => 'TER',
            'Saint-Jean-sur-Richelieu' => 'SJR',
            'Repentigny' => 'REP',
            'Boucherville' => 'BOU',
            'Saint-Jérôme' => 'SJE',
            'Châteauguay' => 'CHA',
            'Drummondville' => 'DRU',
            'Granby' => 'GRA',
            'Saint-Hyacinthe' => 'SHY',
            'Shawinigan' => 'SHA',
            'Dollard-des-Ormeaux' => 'DDO',
            'Victoriaville' => 'VIC',
            'Rimouski' => 'RIM',
            'Saint-Eustache' => 'SEU',
            'Saint-Constant' => 'SCO',
            'Blainville' => 'BLA',
            'Mirabel' => 'MIR',
            'Brossard' => 'BRO',
            'Lévis' => 'LEV',
            'Val-d\'Or' => 'VAL',
            'Alma' => 'ALM',
            'Rouyn-Noranda' => 'ROU'
        ];

        $city = $this->faker->randomElement(array_keys($quebecCities));

        return [
            'city' => $city,
            'abreviation' => $quebecCities[$city]
        ];
    }
}
