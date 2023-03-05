<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    private $basket;

    public function __construct()
    {
        $this->getBasket();
    }

    private function getBasket()
    {
        $basket_id = request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $this->basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $exception) {
                $this->basket = Basket::create();
            }
        } else {
            $this->basket = Basket::create();
        }
        Cookie::queue('basket_id', $this->basket->id, 60 * 24 * 365);
    }

    public function index(Request $request)
    {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket.index', compact('products'));
        }
        return view('basket.index');
    }

    public function checkout()
    {
        return view('basket.checkout');
    }

    public function add(Request $request, $id)
    {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($id, $quantity);

        return back();
    }

    public function increase($id)
    {
        $this->basket->increase($id);

        return redirect()
            ->route('basket.index');
    }

    public function decrease($id)
    {
        $this->basket->decrease($id);

        return redirect()
            ->route('basket.index');
    }

    public function change($basket_id, $product_id, $count = 0)
    {
        if ($count === 0) {
            return;
        }

        $basket = Basket::findOrFail($basket_id);

        if ($basket->products->contains($product_id)) {
            $pivotRow = $basket->products()->where('product_id', $product_id)->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {
                $pivotRow->update(['quantity' => $quantity]);
                $basket->touch();
            } else {
                $pivotRow->delete();
            }
        }
    }

    public function remove($id)
    {
        $this->basket->remove($id);

        return redirect()->route('basket.index');
    }

    public function clear()
    {
        $this->basket->delete();

        return redirect()->route('basket.index');
    }
}
