<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Addresses;
use Illuminate\Http\Request;

class StoreController extends Controller{

      public function showAddresesPage(){
            $user = User::with('addresses')->find(auth()->user()->user_id);
            $addresses = $user->addresses ?? collect();
            $hasPrimaryAddress = $addresses->contains('is_primary_address', '1');
            $address = $addresses->first();

            return view('store.addresses', compact('user', 'addresses', 'address', 'hasPrimaryAddress'));
      }

      public function formAddresesPage(){
            return view('store.addaddreses');
      }

      public function addAddress(Request $request){
            try {
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
            } catch (\Exception $e) {
                  return redirect('/addresses')->with('error', 'Alamat gagal ditambahkan. Coba lagi!');
            }
      }

      public function editAddress(Request $request, $address_id){
            $address = Addresses::find($address_id);
            return view('store.editaddresses', compact('address'));
      }

      public function updateAddress(Request $request){
            try {
                  $request->validate([
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
            } catch (\Exception $e) {
                  return redirect('/addresses')->with('error', 'Alamat gagal diubah. Coba lagi!');
            }
      }

      public function updateMainAddress(Request $request, $address_id){
            try {
                  $address = Addresses::findOrFail($address_id);
                  $address->is_primary_address = '1';
                  $address->save();
                  return redirect('/addresses')->with('success', 'Alamat utama berhasil diubah');
            } catch (\Exception $e) {
                  return redirect('/addresses')->with('error', 'Alamat utama gagal diubah. Coba lagi!');
            }
      }

      public function removeMainAddress(Request $request, $address_id){
            try {
                  $address = Addresses::findOrFail($address_id);
                  $address->is_primary_address = '0';
                  $address->save();
                  return redirect('/addresses')->with('success', 'Alamat utama berhasil dihapus');
            } catch (\Exception $e) {
                  return redirect('/addresses')->with('error', 'Alamat utama gagal dihapus. Coba lagi!');
            }
      }

      public function deleteAddress(Request $request, $address_id){
            try {
                  $address = Addresses::findOrFail($address_id);
                  $address->delete();
                  return redirect('/addresses')->with('success', 'Alamat berhasil dihapus');
            } catch (\Exception $e) {
                  return redirect('/addresses')->with('error', 'Alamat gagal dihapus. Coba lagi!');
            }
      }

}