<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\notificationModel;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function checkStockCart(){

        $cart = Cart::all();

        foreach($cart as $item){
            $pd = Products::find($item->product_id);

            if($pd->stocks === 0){
                $cartUpdate = Cart::where('email','=',$item->email)->where('product_id','=',$item->product_id);
                $cartUpdate->delete();

                notificationModel::create([
                    'email'=>auth()->user()->email,
                    'message'=> 'An item has been removed from your cart due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.',
                    'status'=>'false',
                ]);
            }

            if($pd->stocks < $item->quantity){
                $cartUpdate = Cart::where('email','=',$item->email)->where('product_id','=',$item->product_id)->first();
                $cartUpdate->quantity = $pd->stocks;
                $cartUpdate->save();

                notificationModel::create([
                    'email'=>auth()->user()->email,
                    'message'=> 'An item has been modified from your cart due to insufficient stock availability.',
                    'status'=>'false',
                ]);
            }
        }

    }

    public function cart()
    {
        $cart = Cart::all();
        $totalprice = Cart::sum('totalprice');
        
        return view('cart', compact(['cart', 'totalprice']));
    }

    public function updateCart(Request $request)
    {
        $id = $request->query('id');
        $quantity = $request->query('quantity');

        $update = Cart::where('id', $id)->first();

        $totalPrice = 0;

        if ($update) {
            $totalPrice = $quantity * $update->price;

            $update->quantity = $quantity;
            $update->totalprice = $totalPrice;

            $update->save();

            return Response()->json(['status' => 'success']);
        }
    }


    public function getCartCount()
    {
        if (Auth::check()) {
            $email = auth()->user()->email;
            $cart = Cart::all();
            $totalCount = 0;
            if ($cart) {
                foreach ($cart as $item) {
                    $totalCount++;
                }

                return response()->json(['cartCount' => $totalCount]);
            }
        }
    }

    public function checkForUpdate(Request $request)
    {
        $carts = Cart::where('email', auth()->user()->email)->get();
        $updateAvailable = false;
        $updatedCarts = [];
        $lastCheckedTimestamp = $request->session()->get('lastCheckedTimestamp');
        foreach ($carts as $cart) {
           

            if ($cart->updated_at > $lastCheckedTimestamp) {
                $request->session()->put('lastCheckedTimestamp', $cart->updated_at);
                $updateAvailable = true;
                // Accumulate updated cart data if needed.
                $updatedCarts[] = $cart; // Store updated cart data.
            }
        }

        if ($updateAvailable) {
            // Return a response indicating that updates are available and provide updated cart data.
            return response()->json(['updateAvailable' => true, 'updatedCarts' => $updatedCarts]);
        } else {
            // No updates in any cart.
            return response()->json(['updateAvailable' => false]);
        }
    }



    public function removeCart(Request $request)
    {
        $id = $request->query('id');
        $email = auth()->user()->email;

        $remove = Cart::where('id', '=', $id)
            ->where('email', '=', $email)->first();

        if ($remove) {
            $remove->delete();

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function removeAll()
    {
        $cart = Cart::where('email', auth()->user()->email);

        if ($cart) {
            $del = $cart->delete();
            if ($del) {
                session()->flash('removeall', 'All Done!');
                return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false]);
            }
        }
    }


    public function addtocart(Request $request)
    {
        $id = $request->query('id');
        if (Auth::check()) {
            $email = auth()->user()->email;
            $pdCheck = Cart::where('product_id', $id)
                ->where('email', $email)->first();

            $quantity = 0;
            if ($pdCheck) {
                $quantity = $pdCheck->quantity;
                $quantity += 1;
                $totalprice = $quantity * $pdCheck->price;

                $pdCheck->quantity = $quantity;
                $pdCheck->totalprice = $totalprice;

                $pdCheck->save();


                return response()->json(['updatestatus' => 'success']);
            } else {
                $quantity = 1;
                $readProduct = Products::where('id', $id)->first();

                $data['email'] = $email;
                $data['product_id'] = $id;
                $data['pdname'] = $readProduct->pdname;
                $data['pdImage'] = $readProduct->image;
                $data['quantity'] = $quantity;
                $data['price'] = $readProduct->price;
                $data['totalprice'] = $readProduct->price;
                $data['individual'] = "false";

                $createCart = Cart::create($data);

                if ($createCart) {
                    return response()->json(['status' => 'success']);
                } else {
                    return response()->json(['status' => 'failed']);
                }
            }
        }
    }
}
