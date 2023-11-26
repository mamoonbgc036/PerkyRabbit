<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminRequest;

class RegisterController extends Controller
{
    public function store(StoreAdminRequest $request)
    {
        $admin_info  =  $request->validated();

        if ($request->hasFile('image')) {
            $admin_image_path  = Storage::put('admin/', $request->file('image'));
            $admin_info['image'] = $admin_image_path;
        }
        // dd($admin_info);

        $user  = User::create($admin_info);

        return response()->json(['message' => 'Product created successfully', 'user' => $user], 201);
    }
}
