<?php

namespace App\Controllers;
use App\Models\Produto;

class ProdutoController {

    
    public function exibeTabela(){
        
        $p = new Produto(1, 'produto', 'kg');
        $produtos = $p->getAll();
        
        $tabela = '';
            $tabela .= '<table class="table">
                            <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Medida</th>   
                                </tr>
                            </thead>
                        <tbody>';
    
            foreach($produtos as $produto){
    
                $tabela .= '<tr>
                                <th>'.$produto[0].'</th>
                                <th>'.$produto[1].'</th>
                                <td>'.$produto[2].'</td>    
                            </tr>';
            }
    
        
        $tabela .= `</tbody></table>`;
    
        echo $tabela;
    }
}