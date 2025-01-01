<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CorSeeder extends Seeder
{
    public function run()
    {
       $corModel = new \App\Models\CorModel();

       $cores = [
        [
            'nome' => 'Amarela',
            'descricao' => 'Descrição da cor',
        ],
        [
            'nome' => 'Azul',
            'descricao' => 'Descrição da cor',
        ],
        [
            'nome' => 'Vermelha',
            'descricao' => 'Descrição da cor',
        ],
        [
            'nome' => 'Verde',
            'descricao' => 'Descrição da cor',
        ],
        [
            'nome' => 'Branca',
            'descricao' => 'Descrição da cor',
        ],
        [
            'nome' => 'Preta',
            'descricao' => 'Descrição da cor',
        ],

       ];

       //dd($cores);

       foreach($cores as $cor) {
        $corModel->insert($cor);
       }

       echo 'Cores inseridas com sucesso !';
    }
}
