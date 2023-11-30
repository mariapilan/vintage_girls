<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(AgendaFormRequest $request)
    {

       

        $agendaExistente = Agenda::where('profissional_id', $request->profissional_id)->where('horario_data',$request->horario_data)->first();


        if ($agendaExistente) {
            return response()->json([
                "status" => false,
                "message" => "Já existe uma agenda cadastrada para essa data e profissional."
            ], 400);
        }

        $agenda = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'cliente_id' => $request->cliente_id,
            'horario_data' => $request->horario_data,
            'servico_id' => $request->servico_id,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor' => $request->valor
        ]);


        return response()->json([
            "success" => false,
            "message" => "Agendamento feito com sucesso",
            "data" => $agenda

        ], 200);
    
    }


    public function pesquisarPorId($id)
    {
        $agenda = Agenda::find($id);
        if ($agenda == null) {
            return response()->json([
                'status' => false,
                'message' => "não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $agenda
        ]);
    }

    public function editar(Request $request)
    {
        $agenda = Agenda::find($request->id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => 'não encontrado'
            ]);
        }

        if (isset($request->profissional_id)) {
            $agenda->profissional_id = $request->profissional_id;
        }

        if (isset($request->cliente_id)) {
            $agenda->cliente_id = $request->cliente_id;
        }

        if (isset($request->servico_id)) {
            $agenda->servico_id = $request->servico_id;
        }

        if (isset($request->horario_data)) {
            $agenda->horario_data = $request->horario_data;
        }

        if (isset($request->tipo_pagamento)) {
            $agenda->tipo_pagamento = $request->tipo_pagamento;
        }

        if (isset($request->valor)) {
            $agenda->valor = $request->valor;
        }



        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
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