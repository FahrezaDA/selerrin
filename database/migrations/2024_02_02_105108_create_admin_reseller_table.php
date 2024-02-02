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
            Schema::create('admin_reseller', function (Blueprint $table) {
                $table->unsignedBigInteger('id_admin');
                $table->unsignedBigInteger('id_reseller');
                $table->primary(['id_admin', 'id_reseller']);
                
                // Foreign keys
                $table->foreign('id_admin')
                    ->references('id_user')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    
                $table->foreign('id_reseller')
                    ->references('id_user')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    
                $table->timestamps();
            });
        }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_reseller');
    }
};
