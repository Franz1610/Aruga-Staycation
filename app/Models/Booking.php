<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'room_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guests_count',
        'special_requests',
        'check_in_date',
        'check_out_date',
        'check_in_time',
        'check_out_time',
        'nights_count',
        'payment_method',
        'cash_securing_method',
        'receipt_file_path',
        'card_last_four',
        'down_payment',
        'remaining_balance',
        'total_price',
        'status',
        'rejection_reason',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'check_in_date' => 'date',
            'check_out_date' => 'date',
            'down_payment' => 'decimal:2',
            'remaining_balance' => 'decimal:2',
            'total_price' => 'decimal:2',
            'guests_count' => 'integer',
            'nights_count' => 'integer',
        ];
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
