<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // branch_id እዚህ ጋር መኖሩን አረጋግጥ
    protected $fillable = ['user_id', 'juice_id', 'branch_id', 'quantity','order_type', 'phone', 'address', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function juice() {
        return $this->belongsTo(Juice::class);
    }

    // አዲሱ ግንኙነት፡ ትዕዛዙ የየትኛው ቅርንጫፍ እንደሆነ ለማወቅ
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
}
