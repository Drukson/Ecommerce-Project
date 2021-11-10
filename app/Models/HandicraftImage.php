<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandicraftImage extends Model
{
    use HasFactory;

    public function handicraft()
    {
        return $this->belongsTo(Handicraft::class, 'handicraft_id', 'id');
    }
}
