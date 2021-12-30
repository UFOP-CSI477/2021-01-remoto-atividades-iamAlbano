<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Unidade;
use App\Http\Requests\StoreUnidadesRequest;
use App\Http\Requests\UpdateUnidadesRequest;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades.index', 
        ['unidades' => $unidades,
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnidadesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadesRequest $request)
    {
        $unidade = New Unidade;
        $unidade->nome = $request->nome;
        $unidade->data = $request->data;
        $unidade->bairro = $request->bairro;
        $unidade->cidade = $request->cidade;
        $unidade->estado = $request->estado;
        $unidade->save();
        return redirect()->route('unidades.index')->with('success', 'Unidade cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnidadesRequest  $request
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadesRequest $request, Unidade $unidade)
    {
        $unidade->nome = $request->nome;
        $unidade->data = $request->data;
        $unidade->bairro = $request->bairro;
        $unidade->cidade = $request->cidade;
        $unidade->estado = $request->estado;
        $unidade->save();
        return redirect()->route('unidades.index')->with('success', 'Dados alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidade  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        if(DB::table('registros')->where('unidade_id', $unidade->id)->count() > 0){

            return redirect()->route('unidades.index')->with('danger', 'Impossível excluir esta unidade pois ela está associada a um registro!');

        } else {

            $unidade->delete();
            return redirect()->route('unidades.index')->with('success', 'Unidade excluída com sucesso!');

        }
    }

    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

        if(strlen($search) < 2){
            $unidades = Unidade::orderBy('nome', 'asc')->get();
        } else {
            $unidades = Unidade::where([['nome', 'like', '%'.$search.'%']])->orderBy('nome', 'asc')->get();
        }


        $html = " ";

        foreach($unidades as $unidade){

            $html .= '
            <tr class="align-middle">
            <td class="text-center">'.$unidade->id.'</td>
            <td>'.$unidade->nome.'</td>
            <td>'.$unidade->bairro.'</td>
            <td>'.$unidade->cidade.'</td>
            <td>'.$unidade->estado.'</td>
            <td>'.date('d/m/Y', strtotime($unidade->data)).'</td>
            <td class="text-center">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-'.$unidade->id.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
            <td class="text-center">
                <button class="btn " data-bs-toggle="modal"';

                $html .='data-bs-target="#delete-'.$unidade->id;
                    
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
