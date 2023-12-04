<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\notificationModel;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //



    public function checkoutUpdateOrder()
    {
        $nowDate = now();

        $order = Order::where('orderstatus', '=', 'buynow')
            ->where('email', '=', auth()->user()->email)->first();


        $randomNumber = random_int(1, 50000);
        $user = User::where('email', auth()->user()->email)->first();
        if ($order) {
            $pdStock = Products::where('id', $order->product_id)->first();
            

            $order->transactionid = $randomNumber;
            $order->orderstatus = "Pending";
            $order->address = $user->address;
            $order->country = "Philippines";
            $order->modeofpayment = "Cash on Delivery";

            $order->created_at = $nowDate;

            $save = $order->save();
            if ($save) {

                notificationModel::create(['email'=>'admin@gmail.com', 'message'=> auth()->user()->fname. ' '. auth()->user()->lname. ' has placed an order!', 'status' => 'false']);
                $pdStock->stocks -= $order->quantity;
                $pdStock->save();

                if ($order->quantity > $pdStock->stocks) {
                    $order->quantity = $pdStock->stocks;
                    $order->totalprice = $order->price * $order->quantity;
                    $order->save();
                }


                session()->flash('ordersuccess', 'true');
                return Redirect(route('myorders'));
            }
        }
    }

    public function checkoutOrder()
    {
        $Order = Order::where('orderstatus', '=', 'buynow')
            ->where('email', '=', auth()->user()->email)->first();

        $user = User::where('email', '=', auth()->user()->email)->first();

        return view('checkout', compact(['Order', 'user']));
    }
    public function myOrder(Request $request)
    {
        $filter = $request->query('filter');
        if ($filter == null || $filter == "") {
            $filter = "All";
        }
        $email = auth()->user()->email;

        $query = Order::where('email', $email);

        if ($filter !== "All") {
            $query->where('orderstatus', '=', $filter);
        }

        $orders = $query->orderBy('updated_at', 'desc')->paginate(5);

        // Append the filter parameter to the pagination links
        $orders->appends(['filter' => $filter]);

        return view('dash-my-order', compact('orders', 'filter'));
    }

    public function updateOrder(Request $request)
    {
        $order = Order::where('email', auth()->user()->email)->get();

        $updateOrder = false;

        $lastUpdated = $request->session()->get('lastUpdate');

        foreach ($order as $items) {

            if ($items->updated_at > $lastUpdated) {
                $request->session()->put('lastUpdate', $items->updated_at);
                $updateOrder = true;
            }
        }
        if ($updateOrder) {
            // Return a response indicating that updates are available and provide updated cart data.
            return response()->json(['status' => true]);
        } else {
            // No updates in any cart.
            return response()->json(['status' => false]);
        }
    }

    public function CancelOrder(Request $request)
    {
        $transactionid = $request->query('id');

        $order = Order::where('email', '=', auth()->user()->email)
            ->where('transactionid', '=', $transactionid)->get();



        if ($order) {
           
            foreach ($order as $items) {
                $items->orderstatus = "Cancelled";
                $confirm = $items->save();
                $pdstock = Products::where('id', $items->product_id)->first();

                $pdstock->stocks = $items->quantity + $pdstock->stocks;
                $pdstock->save();
            }
            if ($confirm) {
                notificationModel::create(['email'=>'admin@gmail.com', 'message'=> auth()->user()->fname. ' '. auth()->user()->lname. ' has cancelled order# '. $transactionid, 'status' => 'false']);
                session()->flash('cancel', 'Order Has Been Cancelled Successfully!');
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }
        }
    }

    public function cartCheckout()
    {
        $cartItems = Cart::where('email', auth()->user()->email)->get();
        $totalPrice = Cart::where('email', auth()->user()->email)->sum('totalprice');

        return view('checkoutcart', compact(['cartItems', 'totalPrice']));
    }

    public function createCartBuy(Request $request)
    {
        $createOrder = "";
        $cartItems = Cart::where('email', auth()->user()->email)->get();
        $randomNumber = random_int(1, 50000);
        $totalprices = Cart::where('email', auth()->user()->email)->sum('totalprice');
        foreach ($cartItems as $items) {

            $pdStock = Products::where('id', $items->product_id)->first();
            $pdStock->stocks = $pdStock->stocks - $items->quantity;
            $pdStock->save();

            $cartQuantity = Cart::where('product_id', $items->product_id)->first();
            if ($cartQuantity->quantity > $pdStock->stocks) {
                $cartQuantity->quantity = $pdStock->stocks;
                $cartQuantity->totalprice = $cartQuantity->price * $cartQuantity->quantity;
                $cartQuantity->save();
            }
            //create the order

            $data['transactionid'] = $randomNumber;
            $data['email'] = auth()->user()->email;
            $data['product_id'] = $items->product_id;
            $data['pdname'] = $items->pdname;
            $data['pdimage'] = $items->pdImage;
            $data['quantity'] = $items->quantity;
            $data['price'] = $items->price * $items->quantity;
            $data['totalprice'] = $totalprices;
            $data['orderstatus'] = "Pending";
            $data['address'] = auth()->user()->address;
            $data['country'] = "Philippines";
            $data['modeofpayment'] = "Cash on Delivery";
            $data['deliverydate'] = "";

            $createOrder = Order::create($data);
        }
        if ($createOrder) {
            notificationModel::create(['email'=>'admin@gmail.com', 'message'=> auth()->user()->fname. ' '. auth()->user()->lname. ' has placed an order!', 'status' => 'false']);
            $deleteCart = Cart::where('email', auth()->user()->email);



            $deleteCart->delete();
            session()->flash('ordersuccess', 'true');
            return Redirect(route('myorders'));
        } else {
            return Redirect(route('index'));
        }
    }


    public function checkBuyStocks()
    {

        $order = Order::where('orderstatus', 'buynow')->get();

        foreach ($order as $items) {
            $pd = Products::find($items->product_id);

            if ($pd->stocks == 0) {
                $orderGet =  Order::where('product_id', $pd->id)->where('orderstatus', 'buynow')->get();

                foreach ($orderGet as $orders) {
                    notificationModel::create([
                        'email' => $orders->email,
                        'message' => 'An item has been removed from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.',
                        'status' => 'false',
                    ]);

                    $orders->delete();

                    
                }
            }
            if($pd->stocks < $items->quantity){

                $orderGet =  Order::where('product_id', $pd->id)->where('orderstatus', 'buynow')->get();
                $orderUpdate = Order::where('product_id', $pd->id)->where('orderstatus', 'buynow')->first();
                $orderUpdate->quantity = $pd->stocks;
                $orderUpdate->save();

                foreach ($orderGet as $orders) {
                    notificationModel::create([
                        'email' => $orders->email,
                        'message' => 'An item has been modified from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.',
                        'status' => 'false',
                    ]);

                    $orders->delete();

                    
                }


            }
            
        }
    }

    public function checkForUpdate(Request $request)
    {
        $orders = Order::where('email', auth()->user()->email)->where('orderstatus', 'buynow')->get();
        $updateAvailable = false;
        $updateOrders = [];
        $lastCheckedTimestamp = $request->session()->get('lastCheckedTimestamp');
        foreach ($orders as $cart) {
           

            if ($cart->updated_at > $lastCheckedTimestamp) {
                $request->session()->put('lastCheckedTimestamp', $cart->updated_at);
                $updateAvailable = true;
                // Accumulate updated cart data if needed.
                $updateOrders[] = $cart; // Store updated cart data.
            }
        }

        if ($updateAvailable) {
            // Return a response indicating that updates are available and provide updated cart data.
            return response()->json(['updateAvailable' => true, 'updateOrders' => $updateOrders]);
        } else {
            // No updates in any cart.
            return response()->json(['updateAvailable' => false]);
        }
    }

    public function createBuy(Request $request)
    {
        $quantity = 1;
        $id = $request->query('id');
        $pdGet = Products::find($id);

        $data['transactionid'] = 0;
        $data['email'] = auth()->user()->email;
        $data['product_id'] = $id;
        $data['pdname'] = $pdGet->pdname;
        $data['pdimage'] = $pdGet->image;
        $data['quantity'] = 1;
        $data['price'] = $pdGet->price;
        $data['totalprice'] = $pdGet->price * 1;
        $data['orderstatus'] = "buynow";
        $data['address'] = "";
        $data['country'] = "";
        $data['modeofpayment'] = "";
        $data['deliverydate'] = "";

        if ($pdGet->stocks == 0) {
            return Response()->json(['status' => 'failed']);
        }

        $createbuy = Order::create($data);

        if ($createbuy) {
            return Response()->json(['status' => 'success']);
        } else {
            return Response()->json(['status' => 'failed']);
        }
    }

    public function updateQuantity(Request $request)
    {
        $quantity = $request->query('quantity');
        $id = $request->query('id');
        $email = auth()->user()->email;
        $price = $request->query('price');

        $updateOrder = Order::where('orderstatus', '=', 'buynow')
            ->where('email', '=', $email)->first();

        if ($updateOrder) {
            $totalprice = $price * $quantity;

            $updateOrder->quantity = $quantity;
            $updateOrder->price = $price;
            $updateOrder->totalprice = $totalprice;
            $updateOrder->save();

            return Response()->json([
                'status' => 'success',
                'totalprice' => $totalprice,
            ]);
        }
    }

    public function buyNow(Request $request)
    {

        $id = $request->query('id');
        $pdGetStock = Products::where('id', '=', $id)->get();

        $stocks = 0;
        foreach ($pdGetStock as $item) {
            $stocks = $item->stocks;
        }
        $quantity = 1;

        $checkOrder = Order::where('orderstatus', '=', 'buynow')->get();

        if ($checkOrder) {
            return view('buynow', compact(['checkOrder', 'stocks']));
        } else {
            return Redirect(URL('/viewproduct?id=' . $id));
        }
    }

    public function getAllOrders()
    {
        $email = auth()->user()->email;
        $orders = Order::where('email', $email)->orderBy('created_at', 'desc')->get()->groupBy('transactionid');

        $html = '';

        if ($orders->count() > 0) { // Check if there are orders

            foreach ($orders as $transactionId => $orderItems) {
                $html .=  '<div class="m-order__get">
                <div class="manage-o__header u-s-m-b-30">
                <div class="dash-l-r">
                    <div>
                        <div class="manage-o__text-2 u-c-secondary">Order
                            #' . $transactionId . '</div>
                        <div class="manage-o__text u-c-silver">Placed on ' . $orderItems[0]->created_at . '</div>
                    </div>

                </div>';

                foreach ($orderItems as $item) {
                    $html .= '<div class="manage-o__description">
                <div class="description__container">
                    <div class="description__img-wrap">
                        <img class="u-img-fluid" src="' . $item->pdimage . '" alt="">
                    </div>
                    <div class="description-title">' . $item->pdname . '</div>
                </div>
                <div class="description__info-wrap">
                    <div>
                        <span class="manage-o__badge badge--delivered">' . $item->orderstatus . '</span>
                    </div>
                    <div>
                        <span class="manage-o__text-2 u-c-silver">Quantity:
                            <span class="manage-o__text-2 u-c-secondary">' . $item->quantity . '</span>
                        </span>
                    </div>
                    <div>
                        <span class="manage-o__text-2 u-c-silver">Total:
                            <span class="manage-o__text-2 u-c-secondary"> PHP ' . $item->totalprice . '</span>
                        </span>
                    </div>
                </div>
            </div>
            </div>
            </div>
            ';
                }
            }


            return response()->json(['html' => $html]);
        } else {
            return response()->json(['status' => 'Error']);
        }
    }
}
