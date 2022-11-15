<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    use HasFactory;
    protected $fillable = [

        'user-id',
        'stock_name',
        'count',
        'department_id',

        'dept_status',
        'store_manager',
        'store_status'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function stocks()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
