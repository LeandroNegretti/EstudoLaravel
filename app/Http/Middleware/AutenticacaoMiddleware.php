<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo $metodo_autenticacao . '-'. $perfil . '<br>';

        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados' . $perfil . '<br>';
        }

        if($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD' . $perfil . '<br>';
        }

        if($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }

        //verifica se o usuário possui acesso a rota
        if(false){
            //se o usuário possuir acesso o $next vai mandar ele para a aplicação
            //$next empurra a aplicação para frente
            return $next($request);
        }else {
            //caso não tenha acesso, essa mensagem será enviada para o usuário
            return Response('Acesso NEGADO! rota exige autenticação');
        }

    }
}
