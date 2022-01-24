<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceltracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceltracks', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('parcel_id')->constrained();
            $table->timestamps();

            $table->index(["parcel_id"], 'fk_parcels_parcel_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parceltracks');
    }
}
