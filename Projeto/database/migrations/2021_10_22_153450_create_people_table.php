<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("name");
            $table->string("fantasy_name")->nullable();
            $table->string("category");
            $table->string("type");
            $table->boolean("blacklist")->default(0);
            $table->string("cpf_cnpj")->nullable()->unique();
            $table->string("rg")->nullable()->unique();
            $table->text("observations")->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');

    }
}
