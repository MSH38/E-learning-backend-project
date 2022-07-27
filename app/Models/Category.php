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
<<<<<<< HEAD
        'status'
=======
        'status',
        'slug', 
        'parent_id'

>>>>>>> 5874addaf486756759507a5c109e56a636baa72f
    ];
    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }
}
