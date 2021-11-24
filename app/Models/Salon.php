<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $table = 'salons';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_salon',
        'address',
        'image',
        'slot_amount',
        'status',
        'description',
    ];
    public function Bookings(){
        return $this->hasMany(Booking::class,'salon_id','id');
    }
    public function chair(){
        return $this->belongsToMany(Chair::class,'salon_chairs','salon_id','chair_id');
    }
    public function time(){
        return $this->belongsToMany(Time::class,'salon_times','salon_id','time_id');
    }
}