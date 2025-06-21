<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['total'];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
