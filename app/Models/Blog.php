<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $primaryKey = 'id';

    protected  $fillable = [
        'title',
        'description',
        'detail',
        'image',
        'status',
        'cate_id',
    ];

    public function cateBlog(){
        return $this->belongsTo(CateBlog::class, 'cate_id','id');
    }
}
