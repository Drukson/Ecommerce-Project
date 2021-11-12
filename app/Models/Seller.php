<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class, 'dzongkhag_id', 'id');
    }

    public function gewog(){
        return $this->belongsTo(Gewog::class, 'gewog_id', 'id');
    }

    public function village(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
