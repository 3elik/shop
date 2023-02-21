<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(Request $request) {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket.index', compact('products'));
        }
        return view('basket.index');
    }

    public function checkout() {
        return view('basket.checkout');
    }

    public function add(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;
        if (empty($basket_id)) {
            $basket = Basket::create();
            $basket_id = $basket->id;
        } else {
            $basket = Basket::findOrFail($basket_id);
            $basket->touch();
        }

        if ($basket->products->contains($id)) {
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
//            $basket->products()->updateExistingPivot($id, ['quantity' => $quantity]);
        } else {
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }

        return back()->withCookie(cookie('basket_id', $basket_id, 52600));
    }
}
