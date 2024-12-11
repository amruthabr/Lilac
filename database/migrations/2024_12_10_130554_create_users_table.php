<?php 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('fk_department');
            $table->bigInteger('fk_designation');
            $table->string('phone_number');
            $table->timestamps();
        });
        
        
//         Schema::table('users', function($table) {
//            $table->foreign('fk_department')->references('id')->on('department');
//            $table->foreign('fk_designation')->references('id')->on('designation');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
