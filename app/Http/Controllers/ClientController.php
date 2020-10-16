<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\ModelClient;

class ClientController extends Controller
{
    private $Clients;

    public function __construct()
    {
        $this->Clients = new ModelClient();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->Clients->all()->sortBy('id');
        return view('index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
     
        $name     = $request->name;
        $cpf      = $request->cpf;
        $telefone = $request->telefone;
        $cep      = $request->cep;
        $cidade   = $request->cidade;
        $estado   = $request->estado;
        $bairro   = $request->bairro;
        $endereco = $request->endereco;

        $cad = $this->Clients->create([
            'name'       => $name,
            'cpf'        => $cpf,
            'telefone'   => $telefone,
            'cep'        => $cep,
            'cidade'     => $cidade,
            'estado'     => $estado,
            'bairro'     => $bairro,
            'endereco'   => $endereco
           
        ]);

        if ($cad) {
            return redirect('clients');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->Clients->find($id);


        return view('create', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        
        $name     = $request->name;
        $cpf      = $request->cpf;
        $telefone = $request->telefone;
        $cep      = $request->cep;
        $cidade   = $request->cidade;
        $estado   = $request->estado;
        $bairro   = $request->bairro;
        $endereco = $request->endereco;

        $this->Clients->where(['id' => $id])->update([
            'name'       => $name,
            'cpf'        => $cpf,
            'telefone'   => $telefone,
            'cep'        => $cep,
            'cidade'     => $cidade,
            'estado'     => $estado,
            'bairro'     => $bairro,
            'endereco'   => $endereco

        ]);

        return  redirect('clients');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $del = $this->Clients->destroy($id);

       return ($del)? "Sim" : "Não";    
    }
}
