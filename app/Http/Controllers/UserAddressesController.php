<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;

class UserAddressesController extends Controller
{
    // 地址页面
    public function index(Request $request)
    {
        return view('user_addresses.index',[
            'addresses' => $request->user()->addresses,
        ]);
    }

    // 新增收货地址的页面
    public function create()
    {
        return view('user_addresses.create_and_edit' , ['address' => new UserAddress()]);
    }

    // 新增用户地址
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        return redirect()->route('user_addresses.index');
    }
}
