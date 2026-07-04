<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model

{
    // እነዚህ ኮለሞች በጅምላ ዳታ እንዲቀበሉ ፍቀድ (ለSeeder አስፈላጊ ነው)
    protected $fillable = ['name', 'location', 'phone'];

    public function juices()
    {
        // "አንድ ቅርንጫፍ ብዙ ጁሶች አሉት" ማለት ነው
        return $this->belongsToMany(Juice::class);
    }

}

