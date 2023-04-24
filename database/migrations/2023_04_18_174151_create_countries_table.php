<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('countries', function (Blueprint $table) {
			$table->id();
			$table->string('code');
			$table->json('name');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('deaths');
			$table->string('updated_at');
			$table->string('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('countries');
	}
};
