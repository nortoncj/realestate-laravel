<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function property_type()
    {
        return $this->belongsTo(PropertyType::class,'ptype_id','id');

    }
}
