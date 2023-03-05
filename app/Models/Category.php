<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Category extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany(Product::class);
    }

    public static function roots() {
        return self::where('parent_id', 0)->with('children')->get();
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
