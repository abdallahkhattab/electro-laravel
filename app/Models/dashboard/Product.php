<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
    
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    
    public function media() {
        return $this->hasMany(Media::class);
    }
    
}
