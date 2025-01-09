<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    public function index()
    {
        
        $data = [
            'titulo' => 'Listando os usuários do sistema',
        ];
        return view('Usuarios/index', $data);
    }

    public function recuperaUsuarios() {

        $request = service('request');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search = $request->getVar('search[value]');
        $order = $request->getVar('order')[0];
        $orderColumn = $order['column'];
        $orderDir = $order['dir'];

        $atributos = ['id', 'nome', 'email', 'ativo', 'imagem'];

        $usuarios = $this->usuarioModel
            ->select($atributos)
            ->like('nome', $search)
            ->orLike('email', $search)
            ->orderBy($atributos[$orderColumn], $orderDir)
            ->findAll($length, $start);

        $totalRecords = $this->usuarioModel->countAll();
        $filteredRecords = $this->usuarioModel
            ->like('nome', $search)
            ->orLike('email', $search)
            ->countAllResults();

        $data = [];

        foreach ($usuarios as $usuario) {
            $data[] = [
                'imagem' => $usuario->imagem,
                'nome' => esc($usuario->nome),
                'email' => esc($usuario->email),
                'ativo' => ($usuario->ativo == true ? 'Ativo' : '<span class="text-warning">Inativo</span>'),
            ];
        }

        return $this->response->setJSON([
            'draw' => $request->getVar('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);

    }
}
