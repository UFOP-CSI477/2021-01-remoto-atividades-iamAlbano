<?php

namespace App\Models;

use App\Database\Connection;
use App\Database\AdapterSQLite;

class Produto implements ModelInterface {

    private $id, $nome, $um;

    public function __construct($id, $nome, $um) {
        $this->id = $id;
        $this->nome = $nome;
        $this->um = $um;
    }
    
    public function __destruct() {
        
    }

    public function getAll(){

    $connection = new Connection(new AdapterSQLite());

    $connection->getAdapter()->open();

    $produtos = $connection->getAdapter()->get()->query("SELECT * FROM produtos")->fetchAll();

    return $produtos;
    }

    public function get($id){
        
    }
}