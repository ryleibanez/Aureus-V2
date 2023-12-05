<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\notificationModel;
use App\Models\Order;
use App\Models\ProductPreview;
use App\Models\ProductPreviewModel;
use App\Models\Products;
use App\Models\User;
use App\Rules\UniqueProductExcept;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //


    public function Delivered(Request $request)
    {
        $id = $request->query('id');
        $order = Order::where('transactionid', $id)->get();

        foreach ($order as $items) {
            $items->orderstatus = "Delivered";
            $items->save();
        }
        notificationModel::create(['email' => $items->email, 'message' => 'Order# ' . $items->transactionid . ' has been succesfully delivered!', 'status' => 'false']);
        return response()->json(['status' => 'success']);
    }

    public function Shipped(Request $request)
    {
        $id = $request->query('id');
        $order = Order::where('transactionid', $id)->get();

        foreach ($order as $items) {
            $items->orderstatus = "Shipped";
            $items->save();
        }
        notificationModel::create(['email' => $items->email, 'message' => 'Order# ' . $items->transactionid . ' has been shipped!', 'status' => 'false']);
        return response()->json(['status' => 'success']);
    }

    public function setDeliverydate(Request $request)
    {
        $id = $request->query('id');
        $fee = $request->query('date');

        $update = Order::where('transactionid', $id)->get();

        foreach ($update as $items) {
            $items->deliverydate = $fee;

            $confirm = $items->save();
        }

        if ($confirm) {
            notificationModel::create(['email' => $items->email, 'message' => 'Order# ' . $items->transactionid . ' estimated delivery date: ' . $fee, 'status' => 'false']);
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function setDeliveryfee(Request $request)
    {
        $id = $request->query('id');
        $fee = $request->query('fee');

        $update = Order::where('transactionid', $id)->get();

        foreach ($update as $items) {
            $items->deliveryfee = $fee;

            $items->totalprice = $items->totalprice + $fee;
            $items->orderstatus = "Processing";

            if ($items->save()) {
            }
        }
        notificationModel::create(['email' => $items->email, 'message' => 'Order# ' . $items->transactionid . '<br>Delivery Fee: ' . $fee, 'status' => 'false']);
        return response()->json(['status' => 'success']);
    }
    public function CancelOrder(Request $request)
    {
        $confirm = "";
        $transactionid = $request->query('id');

        $order = Order::where('transactionid', '=', $transactionid)->get();



        if ($order) {
            foreach ($order as $items) {
                $items->orderstatus = "Cancelled";
                $confirm = $items->save();
                $pdstock = Products::where('id', $items->product_id)->first();

                $pdstock->stocks = $items->quantity + $pdstock->stocks;
                $pdstock->save();
            }
            if ($confirm) {
                notificationModel::create(['email' => $items->email, 'message' => 'Order# ' . $items->transactionid . ' has been cancelled!', 'status' => 'false']);
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }
        }
    }

    public function viewOrderSearch(Request $request)
    {
        $orders = Order::where('transactionid', 'like', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(5);
        $orders->appends(['search' => $request->query('search')]);


        return view('includes.manageorderview', compact('orders'));
    }

    public function searchOrder(Request $request)
    {
        $orders = Order::where('transactionid', 'like', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(5);
        $orders->appends(['search' => $request->query('search')]);



        return view('searchOrder', compact('orders'));
    }


    public function viewOrder(Request $request)
    {
        $filter = $request->query('filter') ?? 'All';

        $validFilters = ['All', 'Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled']; // Add other valid filters
        $filter = in_array($filter, $validFilters) ? $filter : 'All';

        $orders = Order::when($filter !== 'All', function ($query) use ($filter) {
            $query->where('orderstatus', $filter);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);



        return view('includes.manageorderview', compact('orders'));
    }

    public function manageOrderPage(Request $request)
    {
        $filter = $request->query('filter') ?? 'All';

        $validFilters = ['All', 'Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled']; // Add other valid filters
        $filter = in_array($filter, $validFilters) ? $filter : 'All';

        $orders = Order::when($filter !== 'All', function ($query) use ($filter) {
            $query->where('orderstatus', $filter);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('manageorders', compact('orders'));
    }

    function formatDescription($inputDescription)
    {
        // Replace line breaks with <br> tags
        $formattedDescription = nl2br($inputDescription);

        // Replace tabs with &nbsp;
        $formattedDescription = Str::replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $formattedDescription);

        return $formattedDescription;
    }

    public function addProductx(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pdname' => 'required|unique:products',
            'category' => 'required',
            'image' => 'required|array', // Make sure 'image' is an array
            'stocks' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Process file uploads
        $paths = [];

        foreach ($request->file('image') as $image) {
            // Generate a unique name for the file
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the file to the storage directory
            $image->move(public_path('uploads'), $imageName);
            $paths[] = 'uploads/' . $imageName;
        }

        $descriptionFinal =   $this->formatDescription($request->description);
        // Save paths to the database
        $data = [
            'pdname' => $request->input('pdname'),
            'category' => $request->input('category'),
            'image' => $paths[0],
            'mainImage' => json_encode($paths), // Assuming you want to store only the first image path in the 'products' table
            'stocks' => $request->input('stocks'),
            'price' => $request->input('price'),
            'description' => $descriptionFinal,
        ];

        // Create a new instance of the Products model
        $pd = new Products($data);

        // Save the instance to the database
        $pd->save();


        if ($pd) {



            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function editProductPage(Request $request)
    {
        $id = $request->query('id');
        $pd = Products::where('id', $id)->first();
        return view('editProduct', compact('pd'));
    }

    public function editProduct(Request $request)
    {
        $id = $request->input('id');
        $validator = Validator::make($request->all(), [
            'pdname' => ['required', new UniqueProductExcept('products', 'pdname', $id)],
            'category' => 'required',

            'stocks' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422); // 422 Unprocessable Entity status code indicates a validation error
        } else {
            // Process file uploads
            $paths = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    // Generate a unique name for the file
                    $imageName = time() . '_' . $image->getClientOriginalName();

                    // Move the file to the storage directory
                    $image->move(public_path('uploads'), $imageName);
                    $paths[] = 'uploads/' . $imageName;
                }
            }

            // $data = [
            //     'pdname' => $request->input('pdname'),
            //     'category' => $request->input('category'),
            //     'image' => $paths[0], // Corrected to store the file path
            //     'mainImage' => json_encode($paths), 
            //     'stocks' => $request->input('stocks'),
            //     'price' => $request->input('price'),
            //     'description' => $request->input('description'),
            // ];
            $pd = Products::where('id', $id)->first();
            $success = true; // Initialize a success flag
            $descriptionFinal =   $this->formatDescription($request->description);
            if ($pd) {
                $pd->pdname = $request->input('pdname');
                $pd->category = $request->input('category');

                if ($request->hasFile('image')) {
                    $pd->image = $paths[0];
                    $pd->mainImage = json_encode($paths);
                }
                $pd->stocks = $request->input('stocks');
                $pd->price = $request->input('price');
                $pd->description = $descriptionFinal;


                $update = $pd->save();

                if ($update) {
                    $pds = Products::where('id', $id)->first();
                    $cartUpdate = Cart::where('product_id', $id)->get();
                    foreach ($cartUpdate as $items) {
                        $items->pdname = $pds->pdname;
                        $items->pdImage = $pds->image;
                        $items->price = $pds->price;


                        if ($items->quantity > $pds->stocks) {
                            $items->quantity = $pds->stocks;
                        } else if ($pds->stocks === 0) {
                            $items->delete();
                        }
                        $items->totalprice = $items->quantity * $pds->price;

                        if (!$items->save()) {
                            $success = false; // If any item update fails, set the flag to false
                        }
                    }
                    if ($success) {
                        session()->flash('addProduct', 'success');
                        return response()->json(['status' => 'success']);
                    }
                } else {
                    return response()->json(['status' => 'failed']);
                }
            } else {
                return response()->json(['status' => 'failed']);
            }
        }
    }


    public function index()
    {
        return view('admin-home');
    }

    public function addProductPage()
    {
        return view('addProduct');
    }

    public function deleteProduct(Request $request)
    {

        $id = $request->query('id');

        $pd = Products::where('id', $id)->first();
        if ($pd) {
            $pd->delete();

            //remove product from cart
            $cartPd = Cart::where('product_id', $id)->first();
            if ($cartPd) {
                $cartPd->delete();

                session()->flash('remove', 'Product Has Been Removed Successfully');
            } else {
            }
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function manageproduct(Request $request)
    {



        $pd = Products::orderBy('id', 'desc')->paginate(5);

        return view('manageproducts', compact('pd'));
    }

    public function viewProducts()
    {
        $pd = Products::orderBy('id', 'desc')->paginate(5);


        return view('includes.products', compact('pd'));
    }

    public function searchProducts(Request $request)
    {
        $search = $request->query('search');

        $pd = Products::where('pdname', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(5);
        $pd->appends(['search' => $search]);



        return view('includes.products', compact('pd'));
    }

    public function searchProduct(Request $request)
    {
        $search = $request->query('search');

        $pd = Products::where('pdname', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(5);
        $pd->appends(['search' => $search]);

        if ($pd->count() > 0) {
        } else {
            session()->flash('search', 'No Products Found');
            return Redirect(route('manageproducts'));
        }

        return view('adminproductsearch', compact('pd', 'search'));
    }
}
