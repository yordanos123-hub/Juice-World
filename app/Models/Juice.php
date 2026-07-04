<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image_url'];

    public function branches()
    {
        // "አንድ ጁስ በብዙ ቅርንጫፎች ሊኖር ይችላል" ማለት ነው
        return $this->belongsToMany(Branch::class);
    }
}
