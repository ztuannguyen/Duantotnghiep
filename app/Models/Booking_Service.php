<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Service extends Model
{
    use HasFactory;
    protected $table = 'booking_services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'booking_id', 'chair_id','service_id','time_start','time_end','status','salon_id','status'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
    public function chair(){
        return $this->belongsTo(Chair::class,'chair_id','id');
    }
    public function salon(){
        return $this->belongsTo(Salon::class,'salon_id','id');
    }
}
