<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned(false);
            $table->string('english_skill')->nullable(); // 0 = NONE, 1 = Poor, 2= Intermediate, 3= good, 4= perfect
            $table->string('location')->nullable();
            $table->integer('height')->nullable();
            $table->string('phone')->nullable(); //writeable option, like samsung. apple
            $table->string('contract_signed')->nullable(); // does the model already have a contract
            $table->string('available_start_date')->nullable();
            $table->string('warranty')->nullable(); // 0 is no, 1 is yes. if yes, number by months
            $table->integer('years_of_experience')->nullable();
            $table->string('gender')->nullable(); //  male / female / other type box
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->text('note')->nullable();
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
        //
    }
};
