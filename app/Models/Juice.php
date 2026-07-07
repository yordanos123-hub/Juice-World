<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juice extends Model {
    protected $fillable = ['name', 'category', 'price', 'description', 'image'];

    public function branches() {
        return $this->belongsToMany(Branch::class);
    }
}
