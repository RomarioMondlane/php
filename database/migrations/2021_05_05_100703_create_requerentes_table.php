<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerentes', function (Blueprint $table) {
            $table->increments('id');
           // $table->primary('id');
            $table->timestamps();
            $table->Text('nome');
            $table->text('BI');
            $table->Text('Nacionalidade');
            $table->Text('Residencia');
            $table->Integer('Tel');
           
            $table->Text('Instituicao');
            $table->Text('Ministerio');
            $table->text('tipoPeticao');
            $table->text('sugestao');
            $table->date('DatadeEnvio');
            $table->text('Estado');
            
            
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerentes');
    }
}
