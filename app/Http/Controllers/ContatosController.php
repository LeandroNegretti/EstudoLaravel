<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatosController extends Controller
{
    public function contato(Request $request) {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request) {
        //realizar a validação dos dados do formulario recebidos no request
        $regras =  ['nome' => 'required|min:3|max:40|unique:site_contatos',
                    'telefone' => 'required',
                    'email' => 'email',
                    'motivo_contato' => 'required',
                    'mensagem' => 'required',
                ];

        $feedback = [
            //custumizar as mensagens de erro apresentadas no Front
                'nome.min' => 'O campo nome precisa no mínimo ter 3 caracteres',
                'nome.max' => 'O campo nome pode ter no máximo 40 caracteres',
                'nome.unique' => 'O nome informado já está em uso',

                'mensagem.max' => 'A mensagem deve ter no máximo 2000 mil caracteres',

                'email.email' => 'O email informado não é válido',

                'required' => 'O campo :attribute deve ser preenchido'
        ];


        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
