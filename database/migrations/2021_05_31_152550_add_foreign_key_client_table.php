<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('client', function (Blueprint $table) {
			$table->integer('city')->unsigned();
            $table->foreign('city')->references('id')->on('cities');
            
        });
    }	

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
	
	
    public function down()
    {
		
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('client_city_id_foreign');
        });		
    }
	
}
