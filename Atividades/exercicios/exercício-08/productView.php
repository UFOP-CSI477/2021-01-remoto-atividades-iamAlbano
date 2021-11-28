<?php
    require_once 'connection.php';

    $produtos = $connection->query("SELECT * FROM produtos")->fetchAll();

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