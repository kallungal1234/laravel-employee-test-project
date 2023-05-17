<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('Fk_department');
            $table->unsignedBigInteger('Fk_designation');
            $table->BigInteger('phonenumber');
            $table->timestamps();
            $table->foreign('Fk_department')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('Fk_designation')->references('id')->on('designation')->onDelete('cascade');
        });

        // Insert data
        DB::table('users')->insert(
            array(
                [
                    'name' => 'Tommy Mark',
                    'Fk_department' => 1,
                    'Fk_designation' => 1,
                    'phonenumber' => 9078675667
                ],
                [
                    'name' => 'Jhon Due ',
                    'Fk_department' => 1,
                    'Fk_designation' => 2,
                    'phonenumber' => 7898675667
                ],
                [
                    'name' => 'Alex Tom',
                    'Fk_department' => 2,
                    'Fk_designation' => 1,
                    'phonenumber' => 6778675667
                ],
                [
                    'name' => 'Xaviour Samuel',
                    'Fk_department' => 2,
                    'Fk_designation' => 2,
                    'phonenumber' => 9838675667
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
