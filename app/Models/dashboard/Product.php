<?php

namespace App\Models\dashboard;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected $fillable =['name','slug','price','compare_at_price','qty','sku','subcategory_id','category_id','brand_id','featured','status','barcode'];

    //generate random sku
    protected static function boot(){
        parent::boot();

        static::creating(function($product){
            $product->sku = Product::generateSku();

        });
    }

    public static function generateSku()
    {
        return 'SKU' . strtoupper(Str::random(9));    
    }

    public static function generateBarcode(){

 // Generate a unique, 12-digit numeric barcode
    return str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);

    }
    
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
