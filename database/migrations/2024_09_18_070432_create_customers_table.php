<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('name', 100);
            $table->string('address', 100);
            $table->string('age');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('customers')->insert(
            [
                [
                    'email' => 'dinda@email.com',
                    'name' => 'Dinda',
                    'address' => 'Palembang',
                    'age' => 23
                ],
                [
                    'email' => 'dandi@email.com',
                    'name' => 'Dandi',
                    'address' => 'Pekanbaru',
                    'age' => 20
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
