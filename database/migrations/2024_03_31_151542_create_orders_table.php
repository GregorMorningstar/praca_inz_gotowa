<?php

use App\enum\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('miejsce_zaladunku');
            $table->date('data_zaladunku');
            $table->string('miejsce_docelowe');
            $table->date('data_rozladunku');
            $table->integer('dystans');
            $table->enum('role', OrderStatus::ORDERSTATUS)-> default(OrderStatus::PENDING);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
