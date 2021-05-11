<?php

namespace App\Models;

use App\Taka\Favourite\Favouritable;
use App\Taka\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable, Favouritable;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

//    public function sub_category()
//    {
//        return $this->belongsTo(Sub_category::class);
//    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Product_image::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function scopeAvailable()
    {
        return $this->where('is_deleted', 0);
    }



    public function getStarsAttribute()
    {
        return [
            '1' => $this->reviews->where('star', 1)->count(),
            '2' => $this->reviews->where('star', 2)->count(),
            '3' => $this->reviews->where('star', 3)->count(),
            '4' => $this->reviews->where('star', 4)->count(),
            '5' => $this->reviews->where('star', 5)->count(),
        ];
    }




}
