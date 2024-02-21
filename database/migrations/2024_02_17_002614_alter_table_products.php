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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('provider_id')->nullable()->after('price');
            $table->unsignedBigInteger('type_id')->nullable()->after('provider_id');
            $table->unsignedBigInteger('container_id')->nullable()->after('type_id');
            // Add more fields or modify existing ones as needed

            // Add foreign key constraints if needed
            // $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            // $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            // $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['provider_id', 'type_id', 'container_id']);
        });
    }
};
