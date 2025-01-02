<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{

    private $usuarioModel;

    public function index()
    {
        $this->usuarioModel =new \App\Models\UsuarioModel();
    }
}
