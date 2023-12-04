<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    //

    public function addAddress(Request $request)
    {


        $email = auth()->user()->email;
        $address = $request->input('address');
        $country = $request->input('country');

        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'country' => 'required',

        ]);

        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $data['email'] = $email;
        $data['address'] = $address;
        $data['country'] = $country;
        $db = Address::create($data);

        if ($db) {
            session()->flash('statusAdd', 'success');
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'An Error Occured!']);
        }
    }

    public function manageAddress(Request $request)
    {
        $id = $request->query('id');

        $mode = $request->query('mode');

        switch ($mode) {
            case "Delete":

                $db = Address::where('id', '=', $id)->where('email', '=', auth()->user()->email)->first();

                $del = $db->delete();
                if ($del) {
                    return response()->json(['status' => 'success']);
                }
                break;

            case "Default":

                $user = User::where('email', auth()->user()->email)->first();
                if ($user) {
                    $address = $user->address;
                    $country = $user->country;

                    $addressDb = Address::where('id','=', $id)->where('email', '=',auth()->user()->email)->first();
                    if ($address) {
                        $newAddress = $addressDb->address;
                        $newCountry = $addressDb->country;

                        $addressDb->address = $address;
                        $addressDb->country = $country;
                        //update Address Table
                        $updateAddress = $addressDb->save();
                        if ($updateAddress) {
                            $user->address = $newAddress;
                            $user->country = $newCountry;
                           $updateUserAddress = $user->save();

                           if($updateUserAddress){
                            return response()->json(['status'=>'success']);
                           }
                        }

                        //update Table


                    }
                }



                break;
        }
    }
    public function addresspage()
    {
        $main = User::where('email', auth()->user()->email)->get();
        $address = Address::where('email', auth()->user()->email)->get();


        return view('dash-address-book', compact('main', 'address'));
    }

    public function editAddressPage()
    {
        return view('dash-address-edit');
    }


    public function addAddressPage()
    {
        return view('addAddress');
    }

    public function updateAddress(Request $request)
    {
        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        if ($user) {
            $validator = Validator::make($request->all(), [
                'address' => 'required',

            ]);

            if ($validator->fails()) {
                // Validation failed
                return response()->json([
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user->address = $request->address;

            $update = $user->save();

            if ($update) {
                session()->flash('status', 'success');
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }
        }
    }
}
