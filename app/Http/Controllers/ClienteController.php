<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = Cliente::All();
        $cliente = new Cliente();
        return view('atividade01',[
            "clientes" => $clientes,
            "cliente" => $cliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get("id")==""){
            $cliente = new Cliente();
        }else{
            $cliente = Cliente::Find($request->get("id"));
        }
        $cliente = new Cliente();

        $cliente->nome = $request->get("nome");
        $cliente->cpf = $request->get("cpf");
        $cliente->email = $request->get("email");
        $cliente->telefone = $request->get("telefone");
        $cliente->data_nascimento = $request->get("data_nascimento");

        $cliente->save();
        return redirect("/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente =Cliente::Find($id);
        return response()->json([
            "nome" => $cliente->nome,
            "cpf" => $cliente->cpf,
            "email" =>$cliente->email
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes= Cliente::All();
        $cliente = Cliente::Find($id);
        return view('atividade01',[
            "clientes" => $clientes,
            "cliente" => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect("/cliente");
    }
}
