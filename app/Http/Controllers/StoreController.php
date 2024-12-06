<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Addresses;
use Illuminate\Http\Request;

class StoreController extends Controller{

      public function showAddresesPage(){
            $user = User::with('addresses')->find(auth()->user()->user_id);
            $address = $user->addresses->first();
            return view('store/addresses', compact('user','address'));
      }

      public function addAddress(Request $request){
            $request->validate([
                  'user_id' => 'required',
                  'address_label' => 'required',
                  'receipt_name' => 'required',
                  'province' => 'required',
                  'city_or_regency' => 'required',
                  'district' => 'required',
                  'postal_code' => 'required',
                  'full_address' => 'required',
                  'address_note' => 'required',
            ]);

            $address = new Addresses;

            $address->user_id = $request->user_id;
            $address->address_label = $request->address_label;
            $address->receipt_name = $request->receipt_name;
            $address->province = $request->province;
            $address->city_or_regency = $request->city_or_regency;
            $address->district = $request->district;
            $address->postal_code = $request->postal_code;
            $address->full_address = $request->full_address;
            $address->address_note = $request->address_note;

            $address->save();

            return redirect('/addresses')->with('success', 'Alamat berhasil ditambahkan');

      }

      public function updateAddress(Request $request){
            $request->validate([
                  'user_id' => 'required',
                  'address_label' => 'required',
                  'receipt_name' => 'required',
                  'province' => 'required',
                  'city_or_regency' => 'required',
                  'district' => 'required',
                  'postal_code' => 'required',
                  'full_address' => 'required',
                  'address_note' => 'required',
            ]);

            $address = Addresses::find($request->address_id);

            $address->user_id = $request->user_id;
            $address->address_label = $request->address_label;
            $address->receipt_name = $request->receipt_name;
            $address->province = $request->province;
            $address->city_or_regency = $request->city_or_regency;
            $address->district = $request->district;
            $address->postal_code = $request->postal_code;
            $address->full_address = $request->full_address;
            $address->address_note = $request->address_note;

            $address->save();

            return redirect('/addresses')->with('success', 'Alamat berhasil diubah');

      }

}