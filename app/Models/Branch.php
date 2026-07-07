<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    // ይህ በጣም አስፈላጊ ነው!
    protected $fillable = ['name', 'location', 'phone'];

    public function juices()
    {
        return $this->belongsToMany(Juice::class);
    }
}
