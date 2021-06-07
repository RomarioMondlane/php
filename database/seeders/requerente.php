<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class requerente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        requerentes::create([
            'nome'=>'Romario Monjane',
            'BI' =>'0123456789123W',
            'Nacionalidade'=>'Mocambicana',
            'Residencia'=>'Jardim-Cidade Maputo',
            'Instituicao'=>'misau',
            'tipoPeticao'=>'Reclamacao',
            'sugestao'=>'Falta de medicamento nas farmacia',
            'DatadeEnvio'=>'2021-05-12',
            'Estado'=>'PENDETE',





        ]);
    }
}
