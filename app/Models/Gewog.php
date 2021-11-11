<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gewog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class, 'dzongkhag_id', 'id');
    }
}
