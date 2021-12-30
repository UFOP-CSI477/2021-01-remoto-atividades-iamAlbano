<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;
use App\Models\Registro;
use App\Models\Unidade;
use App\Models\Pessoa;

class GeralController extends Controller
{
    public function index(){

        $vacinas = Vacina::all();

        return view('geral', [
            'active' => 2,
            'vacinas' => $this->tabela_vacinas(),
            'dose' => $this->tabela_aplicacao(),
            
            ]);
    }

    public function tabela_vacinas()
    {
        $vacinas = Vacina::all();
        $dados = [];
        $total = Registro::all()->count();

        foreach($vacinas as $vacina){

            
            $quantidade = Registro::where('vacina_id', $vacina->id)->count();
            $porc = ($quantidade*100)/$total;
            array_push($dados, [$vacina->nome, $quantidade, strval($porc).'%']);
            
        }
        array_push($dados, ['TOTAL GERAL', $total, '100%']);

        return $dados;    

    }


    public function tabela_aplicacao(){

        $pessoas = Pessoa::all();
        $vacinas = Vacina::all();

        $dose = [
            'unica' => 0,
            'primeira' => 0,
            'segunda' => 0,
            'reforco' => 0,
            'cruzada' => 0,
            'total' => 0 ];
        
        foreach($pessoas as $pessoa){
            foreach($vacinas as $vacina){
                $quant_doses = Registro::where('pessoa_id', $pessoa->id)
                                       ->where('vacina_id', $vacina->id)
                                       ->count();
                
                if($vacina->doses == 1 && $quant_doses == 1){
                    $dose['unica'] +=1;
                } else if($vacina->doses == 2 && $quant_doses == 1){
                    $dose['primeira'] +=1;
                } else if($vacina->doses == 2 && $quant_doses >= 2){
                    $dose['segunda'] +=1;
                } else if($quant_doses >= 3){
                    $dose['reforco'] +=1;
                } 

                $dose['total'] += $quant_doses;
            }
        }
            $dose['cruzada'] = $dose['total'] - ($dose['unica'] + $dose['primeira'] + $dose['segunda'] + $dose['reforco']);
            return $dose;    
    }




}
