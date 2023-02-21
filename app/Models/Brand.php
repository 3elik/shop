<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Brand extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany(Product::class);
    }
}
