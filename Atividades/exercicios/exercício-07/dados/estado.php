<?php

    $dbfile = "./db/database.sqlite";
    $dbuser = "";
    $dbpassword = "";
    $dbhost = "";
    $strConnection = "sqlite:". $dbfile;

    $connection = new PDO($strConnection);


    // var_dump($connection);

    $estados = $connection->query("SELECT * FROM estados")->fetchAll();

    // echo '<pre>';
    // var_dump($estados);
    // echo '</pre>';

        $tabela = '';
        $tabela .= '<table class="table overflow-scroll">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Sigla</th>   
                            </tr>
                        </thead>
                    <tbody>';

        foreach($estados as $estado){

            $tabela .= '<tr>
                            <th>'.$estado[1].'</th>
                            <td>'.$estado[2].'</td>    
                        </tr>';
        }

    
    $tabela .= `</tbody></table>`;

    echo $tabela;

 
