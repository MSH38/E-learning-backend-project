<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
        'status'

    ];
    public function sub_categories(){
        return $this->hasMany(Sub_Category::class,'category_id');
    }
}