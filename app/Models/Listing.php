<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;
use App\Models\User;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function property_type()
    {
        return $this->belongsTo(PropertyType::class,'ptype_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'agent_id','id');
    }
}
