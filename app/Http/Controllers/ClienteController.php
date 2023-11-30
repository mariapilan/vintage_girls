<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request)
    {
        $clientes = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'senha' => Hash::make($request->senha)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadrastado com sucesso",
            "data" => $clientes

        ], 200);
    }

    public function pesquisarPorNome(Request $request)
    {
        $clientes = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarCpf(Request $request)
    {
        $clientes = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarCelular(Request $request)
    {
        $clientes = Cliente::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarEmail(Request $request)
    {
        $clientes = Cliente::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function update (Request $request){
        $cliente = Cliente::find($request->id);
    
        if(!isset($cliente)){
            return response()->json([
                'status'=> false,
                'message'=> 'Serviço não encontrado'
            ]);
        }
    
        if (isset($request->nome)){
            $cliente->nome = $request->nome;
        }
        
        if (isset($request->celular)){                                                 
            $cliente->celular = $request->celular;
        }

        if (isset($request->email)){
            $cliente->email = $request->email;
        }

        if (isset($request->cpf)){
            $cliente->cpf = $request->cpf;
        }

        if (isset($request->dataNascimento)){
            $cliente->dataNascimento = $request->dataNascimento;
        }

        if (isset($request->cidade)){
            $cliente->cidade = $request->cidade;
        }

        if (isset($request->estado)){
            $cliente->estado = $request->estado;
        }

        if (isset($request->pais)){
            $cliente->pais = $request->pais;
        }

        if (isset($request->rua)){
            $cliente->rua = $request->rua;
        }

        if (isset($request->numero)){
            $cliente->numero = $request->numero;
        }

        if (isset($request->bairro)){
            $cliente->bairro = $request->bairro;
        }

        if (isset($request->cep)){
            $cliente->cep = $request->cep;
        }

        if (isset($request->complemento)){
            $cliente->complemento = $request->complemento;
        }

        if (isset($request->senha)){
            $cliente->senha = $request->senha;
        }

        $cliente->update();
    
        return response()->json([
            'status'=> true,
            'message'=> 'Serviço atualizado.'
        ]);
    
    }

    public function pesquisarPorId($id){
        $usuario = Cliente::find($id);
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



    public function retornarTodos()
    {
        $clientes = Cliente::all();
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }
    public function excluir($id){
        $cliente = Cliente::find($id);
    
        if(!isset($cliente)){
            return response()->json([
                'status'=>false,
                'message'=> "Serviço não encontrado"
            
            ]);
        }

        $cliente->delete();
        return response()->json([
            'status'=>true,
            'message'=>"Serviço excluído com sucesso"
        ]);
    
        }


    public function recuperarSenha(Request $request)
    {

        $cliente = Cliente::where('email', '=', $request->email)->first();

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'data' => "Cliente não encontrado"

            ]);
        }
       
        $cliente->senha = Hash::make($cliente->email);
      

        $cliente->update();
        return response()->json([
            'status' => true,
            'msg' => 'Senha alterada com sucesso!' 
        ]);

    }

    
}


