<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(AgendaFormRequest $request){
        $agenda = Agenda::create([
           'profissional_id'=> $request->profissional_id,
           'cliente_id'=> $request->cliente_id,
           'horario_data'=> $request->horario_data,
           'servico_id'=> $request->servico_id,
           'tipo_pagamento'=> $request->tipo_pagamento,
           'valor'=> $request->valor
        ]);
           return response()->json([
               "success" => true,
               "message" =>"Agendamento feito com sucesso",
               "data" => $agenda
   
           ],200);
       }
 

       public function pesquisarPorId($id){
        $agenda = Agenda::find($id);
        if($agenda == null){
           return response()->json([
            'status'=> false,
            'message'=> "não encontrado"
           ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $agenda
        ]);
    }

    public function editar (Request $request){
        $agenda = Agenda::find($request->id);
   
        if(!isset($agenda)){
            return response()->json([
                'status'=> false,
                'message'=> 'não encontrado'
            ]);
        }
   
        if (isset($request->profissional)){
            $agenda->profissional = $request->nome;
        }
       
        if (isset($request->celular)){                                                
            $agenda->celular = $request->celular;
        }

        if (isset($request->email)){
            $agenda->email = $request->email;
        }

        if (isset($request->cpf)){
            $agenda->cpf = $request->cpf;
        }

        if (isset($request->dataNascimento)){
            $agenda->dataNascimento = $request->dataNascimento;
        }

        if (isset($request->cidade)){
            $agenda->cidade = $request->cidade;
        }

        
       
        $agenda->update();
   
        return response()->json([
            'status'=> true,
            'message'=> 'Profissional atualizado.'
        ]);
   
    }

    public function excluir($id)
    {
        $agenda = Agenda::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Excluido com sucesso"

            ]);
        }

        $agenda->delete();
        return response()->json([
            'status' => true,
            'message' => "Serviço excluído com sucesso"
        ]);
    }

    public function retornarTodos()
       {
           $agenda = Agenda::all();
           return response()->json([
               'status' => true,
               'data' => $agenda
           ]);
       }


  


   
}