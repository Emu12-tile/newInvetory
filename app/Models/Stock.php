<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'count',
        'brand_name',
        'specification',
        'description'
    ];
    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
