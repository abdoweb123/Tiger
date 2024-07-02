<?php

namespace Modules\Address\Entities;

use App\Models\BaseModel;
use Modules\Client\Entities\Model as EntitiesModel;
use Modules\Country\Entities\Region;
use Modules\Country\Entities\Country;

class Model extends BaseModel
{
    protected $table = 'addresses';

    protected $With = ['Region'];

    protected $guarded = [];

    public function Region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function client()
    {
        return $this->belongsTo(EntitiesModel::class);//, 'client_id'
    }



} //end of class
