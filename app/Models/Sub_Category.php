<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $fillable=[
        'name',
<<<<<<< HEAD
        'category_id',
        'status',
        'image'
=======
        'status',
        "category_id"
>>>>>>> cd8630b85284da0471c1cf56f2fb1831633a3d56

    ];
    public function courses(){
        return $this->hasMany(Course::class,'sub_category_id');
    }
    public function category(){
        return $this->hasMany(Category::class,'category_id');
    }
}
