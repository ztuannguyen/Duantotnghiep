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
            	'image', 	'status',	'order_by',
    ];

    public function CateService(){
        return $this->belongsTo(CateService::class, 'cate_id');
    }
}
