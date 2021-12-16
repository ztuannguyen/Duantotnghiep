<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancel_Bookings extends Model
{
    use HasFactory;

    protected $table = 'cancel_bookings';

    protected $primaryKey = 'id';

    protected  $fillable = [
        'booking_id',
        'reason',
    ];
}
