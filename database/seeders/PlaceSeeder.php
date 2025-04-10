<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            ['name' => 'Parque do Jalapão',             'city' => 'Mateiros',             'state' => 'TO'],
            ['name' => 'Teatro Amazonas',               'city' => 'Manaus',               'state' => 'AM'],
            ['name' => 'Praça dos Girassóis',           'city' => 'Palmas',               'state' => 'TO'],
            ['name' => 'Catedral Metropolitana',        'city' => 'Brasília',             'state' => 'DF'],
            ['name' => 'Pelourinho',                    'city' => 'Salvador',             'state' => 'BA'],
            ['name' => 'Marco Zero',                    'city' => 'Macapá',               'state' => 'AP'],
            ['name' => 'Orla do Guaíba',                'city' => 'Porto Alegre',         'state' => 'RS'],
            ['name' => 'Parque das Dunas',              'city' => 'Natal',                'state' => 'RN'],
            ['name' => 'Centro Histórico de Olinda',    'city' => 'Olinda',               'state' => 'PE'],
            ['name' => 'Rua do Lazer',                  'city' => 'Goiânia',              'state' => 'GO'],
            ['name' => 'Serra do Cipó',                 'city' => 'Santana do Riacho',    'state' => 'MG'],
            ['name' => 'Bondinho de Santa Teresa',      'city' => 'Rio de Janeiro',       'state' => 'RJ'],
            ['name' => 'Cânion do Xingó',               'city' => 'Canindé de São Francisco', 'state' => 'SE'],
            ['name' => 'Parque Nacional dos Lençóis',   'city' => 'Barreirinhas',         'state' => 'MA'],
            ['name' => 'Catedral de Belém',             'city' => 'Belém',                'state' => 'PA'],
            ['name' => 'Parque Zoobotânico',            'city' => 'Teresina',             'state' => 'PI'],
            ['name' => 'Itaipu Binacional',             'city' => 'Foz do Iguaçu',        'state' => 'PR'],
            ['name' => 'Centro Histórico de São Luís',  'city' => 'São Luís',             'state' => 'MA'],
            ['name' => 'Cachoeira Véu da Noiva',        'city' => 'Chapada dos Guimarães','state' => 'MT'],
            ['name' => 'Serra do Roncador',             'city' => 'Barra do Garças',      'state' => 'MT'],
            ['name' => 'Praia de Ponta Negra',          'city' => 'Natal',                'state' => 'RN'],
            ['name' => 'Parque da Cidade',              'city' => 'Aracaju',              'state' => 'SE'],
            ['name' => 'Rua das Pedras',                'city' => 'Búzios',               'state' => 'RJ'],
            ['name' => 'Praça da Estação',              'city' => 'Belo Horizonte',       'state' => 'MG'],
            ['name' => 'Parque Ibirapuera',             'city' => 'São Paulo',            'state' => 'SP'],
            ['name' => 'Cachoeira do Formiga',          'city' => 'Mateiros',             'state' => 'TO'],
        ];

        foreach ($places as $place) {
            Place::create($place);
        }
    }
}
