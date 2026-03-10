<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSlowQueries extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slow_queries', function (Blueprint $table) {
            $table->id();
            $table->text('sql');
            $table->json('bindings')->nullable();
            $table->integer('time_ms');
            $table->string('connection');
            $table->string('route')->nullable();
            $table->string('fingerprint');
            $table->timestamp('executed_at');
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
		Schema::dropIfExists('slow_queries');
	}
}
