<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';
    protected $primaryKey = 'id';
    protected $fillable = [
        'salon_id',
        'slot',
        'time_start',
        'time_end',
    ];
    public function Salon(){
        return $this->belongsTo(Salon::class,'salon_id','id');
    }
}
