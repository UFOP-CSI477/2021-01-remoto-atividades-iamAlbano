<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cidade;
use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::orderBy('updated_at', 'desc')->get();
        return view('cidades.todas-cidades', ['cidades' => $cidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('nome')->get();
        return view('cidades.cadastrar-cidade', ['estados' => $estados]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade;
        $cidade->nome = $request->nome;
        $cidade->estado_id = $request->estados_id;
        $cidade->save();
        return redirect()->route('cidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $estados = Estado::orderBy('nome')->get();
        return view('cidades.edita-cidade',
         ['cidade' => $cidade,
          'estados' =>$estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        DB::table('cidades')->updateOrInsert(
            ['id' => $request->id],
            ['nome' => $request->nome, 'estado_id' => $request->estado_id]
        );

        return redirect()->route('cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return redirect()->route('cidades.index');
    }

    public function pesquisa(){
        return view('cidades.pesquisa');
    }

    public function procurar(Request $request){
        $cidade = Cidade::where('nome', $request->nome)->get();
        return view('cidades.cidade', ['cidade' => $cidade[0]]);
    }
}
