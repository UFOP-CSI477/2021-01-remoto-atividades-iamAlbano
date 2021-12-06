<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::orderBy('updated_at', 'desc')->get();
        return view('estados.todos-estados', ['estados' => $estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.cadastrar-estado'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado;
        $estado->nome = $request->nome;
        $estado->sigla = $request->sigla;
        $estado->save();
        return redirect()->route('estados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estados.edita-estado', ['estado' => $estado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        DB::table('estados')->updateOrInsert(
            ['id' => $request->id],
            ['nome' => $request->nome, 'sigla' => $request->sigla]
        );

        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {

        if($estado->cidades->count() > 0){
            session()->flash('mensagem', 'Exclusão não permitida pois existem cidades associadas a este estado');
        } else {
            $estado->delete();
        }
        return redirect()->route('estados.index');
    }

    public function pesquisa(){
        return view('estados.pesquisa');
    }

    public function procurar(Request $request){
        $estado = Estado::where('nome', $request->nome)->get();
        return view('estados.estado', ['estado' => $estado[0]]);
    }
}
