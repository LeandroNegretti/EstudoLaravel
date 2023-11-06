<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedor = [
            0 => [
                'nome' =>  'fornecedor 1',
                'status' => 'N',
                'CNPJ' => '21.716.802/0001-72'
            ],
            1 => [
                'nome' =>  'fornecedor 2',
                'status' => 'S',
            ]
            ];

        return view('app.fornecedor.index', compact('fornecedor'));
    }
}
