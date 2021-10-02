<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateService extends Model
{
    use HasFactory;
    protected $table = 'cate_services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_cate',
        'order_by',
    ];
}
