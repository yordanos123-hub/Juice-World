<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juice extends Model {
    protected $fillable = ['name', 'amharic', 'category', 'description', 'price', 'image'];

    public function branches() {
        return $this->belongsToMany(Branch::class);
    }
}
