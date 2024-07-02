<?php

namespace Modules\Coupon\app\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Coupon\Database\factories\CouponFactory;
use Modules\Product\Entities\Product;

class Coupon extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'coupon_products');
    }
    // protected static function newFactory(): CouponFactory
    // {
    //     //return CouponFactory::new();
    // }
}
