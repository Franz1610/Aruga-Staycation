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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('restrict');
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone');
            $table->integer('guests_count');
            $table->text('special_requests')->nullable();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('check_in_time')->default('12:00 PM');
            $table->string('check_out_time')->default('11:00 AM');
            $table->integer('nights_count');
            $table->string('payment_method');
            $table->string('cash_securing_method')->nullable();
            $table->string('receipt_file_path')->nullable();
            $table->string('card_last_four')->nullable();
            $table->decimal('down_payment', 10, 2);
            $table->decimal('remaining_balance', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('PENDING');
            $table->string('rejection_reason')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
