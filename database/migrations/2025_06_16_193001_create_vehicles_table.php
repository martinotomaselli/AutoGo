<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modello');
            $table->string('targa')->unique();
            $table->integer('posti');
            $table->decimal('prezzo_giornaliero', 8, 2);
            $table->timestamps();
        });
    }
};

