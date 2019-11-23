<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('disease');
            $table->integer('doctor_id');


            $table->string('date');


            $table->string('day');


            $table->string('month');


            $table->string('year');


            $table->string('visit_time');
            $table->string('doctor_fee');
            $table->string('doctor_fee_due')->nullable();
            $table->boolean('status')->default(0);
            $table->string('address');
            $table->string('phone_number');
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
        Schema::dropIfExists('appointments');
    }
}
