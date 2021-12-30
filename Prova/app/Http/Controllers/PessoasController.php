<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pessoa;
use App\Http\Requests\StorePessoasRequest;
use App\Http\Requests\UpdatePessoasRequest;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', 
        ['pessoas' => $pessoas,
         'active' => 3, 
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
     * @param  \App\Http\Requests\StorePessoasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePessoasRequest $request)
    {

        if($request->data > date('Y-m-d', time())){

            return redirect()->route('pessoas.index')->with('danger', 'Data inválida!');

        } else if(Pessoa::where('cpf', $request->cpf)->count() >= 1 ){

            return redirect()->route('pessoas.index')->with('danger', 'CPF já cadastrado!');

        } else {

        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->data_nascimento = $request->data;
        $pessoa->cpf = $request->cpf;
        $pessoa->save();

        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', ['pessoa' => $pessoa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePessoasRequest  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePessoasRequest $request, Pessoa $pessoa)
    {
        if(Pessoa::where('cpf', $request->cpf)->where('nome', '!=', $pessoa->nome)->count() >= 1 ){

            return redirect()->route('pessoas.index')->with('danger', 'CPF já cadastrado!');

        } else {

        $pessoa->nome = $request->nome;
        $pessoa->data_nascimento = $request->data;
        $pessoa->cpf = $request->cpf;
        $pessoa->save();
        return redirect()->route('pessoas.index')->with('success', 'Dados alterados com sucesso!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        if(DB::table('registros')->where('pessoa_id', $pessoa->id)->count() > 0){

            return redirect()->route('pessoas.index')->with('danger', 'Impossível excluir esta pessoa pois ela está associada a um registro!');

        } else {

            $pessoa->delete();
            return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso!');

        }

    }








    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

        if(strlen($search) < 2){
            $pessoas = Pessoa::orderBy('nome', 'asc')->get();
        } else {
            $pessoas = Pessoa::where([['nome', 'like', '%'.$search.'%']])->orderBy('nome', 'asc')->get();
        }


        $html = " ";

        foreach($pessoas as $pessoa){

            $html .= '
            <tr class="align-middle">
            <td class="text-center">'.$pessoa->id.'</td>
            <td>'.$pessoa->nome.'</td>
            <td>'.date('d/m/Y', strtotime($pessoa->data_nascimento)).'</td>
            <td>'.$pessoa->cpf.'</td>
            <td class="text-center">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-'.$pessoa->id.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
            <td class="text-center">
                <button class="btn " data-bs-toggle="modal"';

                $html .='data-bs-target="#delete-'.$pessoa->id;
                    
                $html .= ' ">
                    <svg fill="#dc3545" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </td>  
            </tr>';

        }

        echo $html;
    }



    
}
