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
        'time_start',
        'time_end',
    ];
   
    public function Bookings(){
        return $this->hasMany(Booking::class,'time_id','id');
    }
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}
