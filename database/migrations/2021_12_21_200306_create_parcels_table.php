<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->integer('referenceno')->unique();
            $table->string('sendername', 32);
            $table->string('senderaddress', 50);
            $table->string('sendercontact', 45);
            $table->string('recipientaddress', 45);
            $table->string('recipientname', 45);
            $table->string('recipientcontact', 45);
            $table->integer('branch_id_t')->constrained();
            $table->integer('branch_id_f')->constrained();
            $table->double('weight');
            $table->double('price')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->integer('user_id');
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
        Schema::dropIfExists('parcels');
    }
}
