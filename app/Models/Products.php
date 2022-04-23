<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'store_id', 'active'];

    /**
     * Get stores
     */
    public function store()
    {
        return $this->belongsTo(Stores::class);
    }
}
