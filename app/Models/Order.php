<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // ለአዲሱ የክፍያ ሲስተም 'payment_method' እና 'payment_status' እዚህ ጋር ተጨምረዋል
    protected $fillable = [
        'user_id',
        'juice_id',
        'branch_id',
        'quantity',
        'order_type',
        'phone',
        'address',
        'status',
        'payment_method',
        'payment_status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function juice() {
        return $this->belongsTo(Juice::class);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }
}
