<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;

    public function __construct()
    {
        $this->basket = Basket::getBasket();
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

    public function saveOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $basket = Basket::getBasket();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $args = array_merge($request->all(), [
           'amount' => $basket->getAmount(),
           'user_id' => $user_id
        ]);
        $order = Order::create($args);

        foreach ($basket->products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->price * $product->pivot->quantity,
            ]);
        }

        $basket->delete();

        return redirect()
            ->route('basket.success')
            ->with('order_id', $order->id)
            ->with('success', 'Your order successfully created');
    }

    public function success(Request $request)
    {
        if ($request->session()->exists('order_id')) {
            $order_id = $request->session()->pull('order_id');
            $order = Order::findOrFail($order_id);
            return view('basket.success', compact('order'));
        }
        return redirect()->route('basket.index');
    }
}
