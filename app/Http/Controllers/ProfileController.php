<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pondok_kampuh.profile');
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->password){
            $this->validate($request, [
                'name' => 'required|min:3',
                // 'email' => 'required',
                'phone' => 'required|min:10|max:13',
                // 'image' => 'required',
                'address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);
            $data = [
                'name' => $request->name,
                // 'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
                // 'image' => $image_path
            ];
        }else{
            $this->validate($request, [
                'name' => 'required|min:3',
                // 'email' => 'required',
                'phone' => 'required|min:10|max:13',
                // 'image' => 'required',
                'address' => 'required'
            ]);
            $data = [
                'name' => $request->name,
                // 'email' => $request->email,
                // 'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
                // 'image' => $image_path
            ];
        }

        $user->update($data);
        if($user){
            return redirect()->back()->with('success', 'Profile is update');
        }else{
            return redirect()->back()->with('error', 'Profile is not update');
        }
    }
}
