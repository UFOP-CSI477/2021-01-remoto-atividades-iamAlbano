<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Vacina;
use App\Http\Requests\StoreVacinasRequest;
use App\Http\Requests\UpdateVacinasRequest;

class VacinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacinas = Vacina::all();
        return view('vacinas.index', 
        ['vacinas' => $vacinas,
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
     * @param  \App\Http\Requests\StoreVacinasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinasRequest $request)
    {
        $vacina = New Vacina;
        $vacina->nome = $request->nome;
        $vacina->fabricante = $request->fabricante;
        $vacina->doses = $request->doses;
        $vacina->pais = $request->pais;
        $vacina->save();
        return redirect()->route('vacinas.index')->with('success', 'Vacina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function show(Vacina $vacina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacina $vacina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVacinasRequest  $request
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacinasRequest $request, Vacina $vacina)
    {
        $vacina->nome = $request->nome;
        $vacina->fabricante = $request->fabricante;
        $vacina->doses = $request->doses;
        $vacina->pais = $request->pais;
        $vacina->save();
        return redirect()->route('vacinas.index')->with('success', 'Dados alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacina $vacina)
    {
        if(DB::table('registros')->where('vacina_id', $vacina->id)->count() > 0){

            return redirect()->route('vacinas.index')->with('danger', 'Impossível excluir esta vacina pois ela está associada a um registro!');

        } else {

            $vacina->delete();
            return redirect()->route('vacinas.index')->with('success', 'Vacina excluída com sucesso!');

        }
    }


    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

        if(strlen($search) < 2){
            $vacinas = Vacina::orderBy('nome', 'asc')->get();
        } else {
            $vacinas = Vacina::where([['nome', 'like', '%'.$search.'%']])->orderBy('nome', 'asc')->get();
        }


        $html = " ";

        foreach($vacinas as $vacina){

            $html .= '
            <tr class="align-middle">
            <td class="text-center">'.$vacina->id.'</td>
            <td>'.$vacina->nome.'</td>
            <td>'.$vacina->fabricante.'</td>
            <td class="text-center">'.$vacina->doses.'</td>
            <td>'.$vacina->pais.'</td>
            <td class="text-center">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-'.$vacina->id.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
            <td class="text-center">
                <button class="btn " data-bs-toggle="modal"';

                $html .='data-bs-target="#delete-'.$vacina->id;
                    
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
