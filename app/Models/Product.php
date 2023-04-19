<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $category_id
 * @property mixed $brand_id
 */
abstract class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

    public function parameters() {
        return $this->hasMany(ProductParameters::class);
    }

    public function save(array $options = []) {
        parent::save($options);
        //TODO Implement save() method.
        $this->saveParameters();
    }
    abstract function saveParameters();
}
