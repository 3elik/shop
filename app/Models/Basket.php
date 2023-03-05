<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function increase($id, $count = 1)
    {
        $this->change($id, $count);
    }

    public function decrease($id, $count = 1)
    {
        $this->change($id, $count * (-1));
    }

    public function change($product_id, $count = 0)
    {
        if ($count === 0) {
            return;
        }

        if ($this->products->contains($product_id)) {
            $pivotRow = $this->products()->where(['product_id' => $product_id])->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {
                $pivotRow->update(['quantity' => $quantity]);
            } else {
                $pivotRow->delete();
            }
        } elseif ($count > 0) {
            $this->products()->attach($product_id, ['quantity' => $count]);
        }

        $this->touch();
    }

    public function remove($product_id)
    {
        $this->products()->detach($product_id);

        $this->touch();
    }
}
