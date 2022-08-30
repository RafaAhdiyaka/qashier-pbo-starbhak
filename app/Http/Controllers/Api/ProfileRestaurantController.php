<?php

namespace App\Http\Controllers\Api;

use App\Models\ProfileRestaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProfileRestaurantResource;

class ProfileRestaurantController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get profile
        $profile_restaurants = ProfileRestaurant::latest()->get();

        //return collection of profile as a resource
        return new ProfileRestaurantResource(true, 'List Data Profiles', $profile_restaurants);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_resto'     => 'required',
            'alamat_resto'   => 'required',
            'nomor_telepon'   => 'required',
            'email_resto'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create profile
        $profile_restaurant = ProfileRestaurant::create([
            'nama_resto'     => $request->nama_resto,
            'alamat_resto'   => $request->alamat_resto,
            'nomor_telepon'   => $request->nomor_telepon,
            'email_resto'   => $request->email_resto,
        ]);

        //return response
        return new ProfileRestaurantResource(true, 'Data Profile Berhasil Ditambahkan!', $profile_restaurant);
    }
        
    /**
     * show
     *
     * @param  mixed $profile
     * @return void
     */
    public function show(ProfileRestaurant $profile_restaurant)
    {
        //return single profile as a resource
        return new ProfileRestaurantResource(true, 'Data Profile Ditemukan!', $profile_restaurant);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile_restaurant
     * @return void
     */
    public function update(Request $request, ProfileRestaurant $profile_restaurant)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_resto'     => 'required',
            'alamat_resto'   => 'required',
            'nomor_telepon'   => 'required',
            'email_resto'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profile_restaurant->update([
            'nama_resto'     => $request->nama_resto,
            'alamat_resto'   => $request->alamat_resto,
            'nomor_telepon'   => $request->nomor_telepon,
            'email_resto'   => $request->email_resto,
        ]);


        //return response
        return new ProfileRestaurantResource(true, 'Data Profile Berhasil Diubah!', $profile_restaurant);
    }
    
    /**
     * destroy
     *
     * @param  mixed $profile_restaurant
     * @return void
     */
    public function destroy(ProfileRestaurant $profile_restaurant)
    {
        //delete profile
        $profile_restaurant->delete();

        //return response
        return new ProfileRestaurantResource(true, 'Data Profile Berhasil Dihapus!', null);
    }
}