<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon_Time extends Model
{
    use HasFactory;
    protected $table = 'salon_times';
    public function salon(){
        return $this->belongsTo(Salon::class,'salon_id','id');
    }
}
