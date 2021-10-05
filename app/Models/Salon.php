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
        'status',
        'description',
    ];
    public function Times(){
        return $this->hasMany(Time::class,'salon_id','id');
    }
    public function Bookings(){
        return $this->hasMany(Booking::class,'salon_id','id');
    }
}