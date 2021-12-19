<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'number_phone',
        'salon_id',
        'time_id',
        'date_booking',
        'status',
        'note',
        'reason',
        'total_price',
        'add_by_user'
    ];
    public function Salon(){
        return $this->belongsTo(Salon::class,'salon_id','id');
    }
    public function Time(){
        return $this->belongsTo(Time::class,'time_id','id');
    }
    public function service(){
        return $this->belongsToMany(Service::class,'booking_services','booking_id','service_id');
    }
    public function booking_detail(){
        return $this->hasMany(Booking_Service::class,'booking_id');
    }
    public function booking_services(){
        return $this->hasMany(Booking_Service::class,'booking_id','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'add_by_user','id');
    }
}
