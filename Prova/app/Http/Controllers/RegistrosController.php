<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Unidade;
use App\Models\Vacina;
use App\Models\Pessoa;
use App\Http\Requests\StoreRegistrosRequest;
use App\Http\Requests\UpdateRegistrosRequest;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::all();
        $unidades = Unidade::all();
        $vacinas = Vacina::all();
        $pessoas = Pessoa::all();

        return view('registros.index', 
        [
         'registros' => $registros,
         'unidades' => $unidades,
         'vacinas' => $vacinas,
         'pessoas' => $pessoas,
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
     * @param  \App\Http\Requests\StoreRegistrosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrosRequest $request)
    {
        $registro = New Registro;
        $registro->pessoa_id = $request->pessoa;
        $registro->unidade_id = $request->unidade;
        $registro->vacina_id = $request->vacina;
        $registro->data = $request->data;
        $registro->save();
        return redirect()->route('registros.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrosRequest  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrosRequest $request, Registro $registro)
    {
        $registro->pessoa_id = $request->pessoa;
        $registro->unidade_id = $request->unidade;
        $registro->vacina_id = $request->vacina;
        $registro->data = $request->data;
        $registro->save();
        return redirect()->route('registros.index')->with('success', 'Dados alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect()->route('registros.index')->with('success', 'Registro excluído com sucesso!');
    }





    public function table(){

        $pessoa = filter_input(INPUT_GET, 'pessoa', FILTER_SANITIZE_STRING);
        $unidade = filter_input(INPUT_GET, 'unidade', FILTER_SANITIZE_STRING);
        $vacina = filter_input(INPUT_GET, 'vacina', FILTER_SANITIZE_STRING);
        
        $registros = Registro::orderBy('data', 'desc')->get();
        


        $html = " ";

        foreach($registros as $registro){

            if($pessoa != 'Todos'){
                if(Pessoa::find($registro->pessoa_id)->id != $pessoa){
                    continue;
                }
            }

            if($unidade != 'Todos'){
                if(Unidade::find($registro->unidade_id)->id != $unidade){
                    continue;
                }
            }

            if($vacina != 'Todos'){
                if(Vacina::find($registro->vacina_id)->id != $vacina){
                    continue;
                }
            }

            $html .= '
            <tr class="align-middle">
            <td class="text-center">'.$registro->id.'</td>
            <td>'. Pessoa::find($registro->pessoa_id)->nome.'</td>
            <td>'. Unidade::find($registro->unidade_id)->nome.'</td>
            <td>'. Vacina::find($registro->vacina_id)->nome.'</td>
            <td>'.date('d/m/Y', strtotime($registro->data)).'</td>
            <td class="text-center">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-'.$registro->id.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
            <td class="text-center">
                <button class="btn " data-bs-toggle="modal"';

                $html .='data-bs-target="#delete-'.$registro->id;
                    
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
