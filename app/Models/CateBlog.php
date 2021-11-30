<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateBlog extends Model
{
    use HasFactory;
    protected $table = 'cate_blogs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'status'
        
    ];
    public function blog(){
        return $this->hasMany(Blog::class, 'cate_id', 'id');
    }
}
