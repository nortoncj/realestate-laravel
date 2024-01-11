<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function property_types()
    {
        return $this->hasOne(PropertyType::class);
//        return $this->belongsTo(PropertyType::class, 'property_types', 'type_name');
    }
}
