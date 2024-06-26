<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['name','category_id','price','image'];

    //Relationship
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function images(){
        return $this->hasMany(Image::class,'product_id','id');
    }
}
