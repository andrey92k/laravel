<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');           
           
            $table->string('full_name')->unique();
            $table->date('dob');
            $table->bigInteger('department_id')->unsigned();
            $table->string('position');
            $table->boolean('rate')->default(false);
            $table->string('clock', 15)->nullable();
            $table->string('payment', 15);


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->index('rate');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}