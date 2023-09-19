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

    public function pesquisarPorNome(Request $request){
        $servicos = Servico::where('nome', 'like', '%'. $request->nome.'%')->get();
        if(count($servicos)>0){
        return response()->json([
            'status'=> true,
            'data'=> $servicos
        ]);
    }
}
    
public function pesquisarPorDescricao(Request $request){
    $servicos = Servico::where('descricao', 'like', '%'. $request->descricao.'%')->get();
    if(count($servicos)>0){
    return response()->json([
        'status'=> true,
        'data'=> $servicos
    ]);
}
}
public function excluir($id){
    $servicos = Servico::find($id);

    if(!isset($servicos)){
        return response()->json([
            'status'=>false,
            'message'=> "Serviço não encontrado"
        ]);

    }

    $servicos->delete();
    return response()->json([
        'status'=>true,
        'message'=>"Serviço excluído com sucesso"
    ]);
}

public function update (Request $request){
    $servicos = Servico::find($request->id);

    if(!isset($servicos)){
        return response()->json([
            'status'=> false,
            'message'=> 'Serviço não encontrado'
        ]);
    }

    if (isset($request->nome)){
        $servicos->nome = $request->nome;
    }
    if (isset($request->descricao)){
        $servicos->descricao = $request->descricao;
    }
    if (isset($request->duracao)){
        $servicos->duracao = $request->duracao;
    }
    if (isset($request->preco)){
        $servicos->preco = $request->preco;
    }

    $servicos->update();

    return response()->json([
        'status'=> true,
        'message'=> 'Serviço atualizado.'
    ]);

}

public function retornarTodos(){
    $servicos = Servico::all();
    return response()->json([
        'status'=> true,
        'data'=> $servicos
    ]);
}

}

