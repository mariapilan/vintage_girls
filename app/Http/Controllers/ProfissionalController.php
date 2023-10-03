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
    }

