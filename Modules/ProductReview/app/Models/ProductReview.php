<?php

namespace Modules\ProductReview\app\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Entities\Model as EntitiesModel;
use Modules\ProductReview\Database\factories\ProductReviewFactory;

class ProductReview extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    public function Client()
    {
        return $this->belongsTo(EntitiesModel::class, 'client_id');
    }
    // protected static function newFactory(): ProductReviewFactory
    // {
    //     //return ProductReviewFactory::new();
    // }
}
