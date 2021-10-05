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
        'number_phone',
        'salon_id',
        'time_id',
        'date_booking',
        'status',
        'note'
        // 'total_price',
        // 'add_by_id_user'
    ];
    public function Salon(){
        return $this->belongsTo(Salon::class,'salon_id','id');
    }
    public function Time(){
        return $this->belongsTo(Time::class,'time_id','id');
    }
    public function service(){
        return $this->belongsToMany(Service::class,'bookings_services','booking_id','service_id');
    }
}
