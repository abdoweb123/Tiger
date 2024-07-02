<?php

namespace Modules\Order\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\Size;
use Modules\Color\Entities\Model as EntitiesModel;
use Modules\Order\Database\factories\OrderProductFactory;
use Modules\Product\Entities\Product;
use Modules\Size\Entities\Model as SizeEntitiesModel;

class OrderProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    
     protected $guarded = [];

    //  protected $with = ['Product', 'Size', 'Color'];
 
     protected $table = 'order_product';
 
     public function Product()
     {
         return $this->belongsTo(Product::class,'product_id');
     }
 
     public function Size()
     {
         return $this->belongsTo(SizeEntitiesModel::class);
     }
 
     public function Color()
     {
         return $this->belongsTo(EntitiesModel::class);
     }
 
     public function RandomImage()
     {
         return $this->Product->Images->first()->image;
     }
    // protected static function newFactory(): OrderProductFactory
    // {
    //     //return OrderProductFactory::new();
    // }
}
