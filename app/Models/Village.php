<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class, 'dzongkhag_id', 'id');
    }

    public function gewog(){
        return $this->belongsTo(Gewog::class, 'gewog_id', 'id');
    }
}
