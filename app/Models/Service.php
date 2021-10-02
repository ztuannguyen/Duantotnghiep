<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory; 

    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cate_id',
        	'name',	'price',	'execution_time'	,'discount',	'description',	'detail',
            	'image',	'total_time', 	'status',	'order_by',
    ];

    public function services(){
        return $this->belongsTo('App\Models\CateService', 'cate_id', 'id');
    }
}