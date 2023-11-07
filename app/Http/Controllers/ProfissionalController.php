<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request){
        $profissional = Profissional::create([
           'nome'=> $request->nome,
           'celular'=> $request->celular,
           'email'=> $request->email,
           'cpf'=> $request->cpf,
           'dataNascimento'=> $request->dataNascimento,
           'cidade'=> $request->cidade,
           'estado'=> $request->estado,
           'pais'=> $request->pais,
           'rua'=> $request->rua,
           'numero'=> $request->numero,
           'bairro'=> $request->bairro,
           'cep'=> $request->cep,
           'complemento'=> $request->complemento,
           'senha'=> Hash::make($request->senha),
           'salario'=> $request->salario
        ]);
           return response()->json([
               "success" => true,
               "message" =>"Profissional Cadrastado com sucesso",
               "data" => $profissional
   
           ],200);
       }

       public function pesquisarPorNome(Request $request)
       {
           $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
           if (count($profissional) > 0) {
               return response()->json([
                   'status' => true,
                   'data' => $profissional
               ]);
           }
           else{
               return response()->json([
                   'status' => false,
                   'message' => "Nenhum cliente encontrado"
               ]);
           }
       }

       public function pesquisarCpf(Request $request)
       {
           $profissional = Profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();
           if (count($profissional) > 0) {
               return response()->json([
                   'status' => true,
                   'data' => $profissional
               ]);
           }
           else{
               return response()->json([
                   'status' => false,
                   'message' => "Nenhum cliente encontrado"
               ]);
           }
       }

       public function pesquisarCelular(Request $request)
       {
           $profissional = Profissional::where('celular', 'like', '%' . $request->celular . '%')->get();
           if (count($profissional) > 0) {
               return response()->json([
                   'status' => true,
                   'data' => $profissional
               ]);
           }
           else{
               return response()->json([
                   'status' => false,
                   'message' => "Nenhum cliente encontrado"
               ]);
           }
       }

       public function pesquisarEmail(Request $request)
       {
           $profissional = Profissional::where('email', 'like', '%' . $request->email . '%')->get();
           if (count($profissional) > 0) {
               return response()->json([
                   'status' => true,
                   'data' => $profissional
               ]);
           }
           else{
               return response()->json([
                   'status' => false,
                   'message' => "Nenhum cliente encontrado"
               ]);
           }
       }

       public function update (Request $request){
        $servicos = Profissional::find($request->id);
    
        if(!isset($servicos)){
            return response()->json([
                'status'=> false,
                'message'=> 'Serviço não encontrado'
            ]);
        }
    
        if (isset($request->nome)){
            $servicos->nome = $request->nome;
        }
        
        if (isset($request->celular)){                                                 
            $servicos->celular = $request->celular;
        }

        if (isset($request->email)){
            $servicos->email = $request->email;
        }

        if (isset($request->cpf)){
            $servicos->cpf = $request->cpf;
        }

        if (isset($request->dataNascimento)){
            $servicos->dataNascimento = $request->dataNascimento;
        }

        if (isset($request->cidade)){
            $servicos->cidade = $request->cidade;
        }

        if (isset($request->estado)){
            $servicos->estado = $request->estado;
        }

        if (isset($request->pais)){
            $servicos->pais = $request->pais;
        }

        if (isset($request->rua)){
            $servicos->rua = $request->rua;
        }

        if (isset($request->numero)){
            $servicos->numero = $request->numero;
        }

        if (isset($request->bairro)){
            $servicos->bairro = $request->bairro;
        }

        if (isset($request->cep)){
            $servicos->cep = $request->cep;
        }

        if (isset($request->complemento)){
            $servicos->complemento = $request->complemento;
        }

        if (isset($request->senha)){
            $servicos->senha = $request->senha;
        }

        if (isset($request->salario)){
            $servicos->salario = $request->salario;
        }
        
    
        $servicos->update();
    
        return response()->json([
            'status'=> true,
            'message'=> 'Serviço atualizado.'
        ]);
    
    }

       public function retornarTodos()
       {
           $profissional = Profissional::all();
           return response()->json([
               'status' => true,
               'data' => $profissional
           ]);
       }

       public function pesquisarPorId($id){
        $usuario = Profissional::find($id);
        if($usuario == null){
           return response()->json([
            'status'=> false,
            'message'=> "Usuário não encontrado"
           ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $usuario
        ]);
    }
    }










