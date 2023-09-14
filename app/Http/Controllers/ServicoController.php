<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(ServicoFormRequest $request)
    {
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);

        return response()->json([
            "sucess" => true,
            "message" => "Serviço Cadastrado com sucesso",
            "data" => $servico
        
        ], 200);
    }

    public function pesquisaPorNome($nome){
        $servico = Servico::find($nome);
        if($servico == null){
            return response()->json([
                'status'=> false,
                'message'=> "Usuario não encontrado"
            ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }
    
    public function pesquisarPorDescricao($descricao){
        $servico = Servico::find($descricao);
        if($servico == null){
           return response()->json([
            'status'=> false,
            'message'=> "Usuário não encontrado"
           ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

}
