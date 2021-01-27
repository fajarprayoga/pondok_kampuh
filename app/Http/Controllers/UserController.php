<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // function __construct() {
    //     if(Auth::user()->status != 'ADMIN'){
    //         return redirect('auth.login');
    //     }
    // }
    public function index()
    {
        $user = User::all();
        return view('user.index', ['users' => $user ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $data = [
            'roles' => $request->roles,
            'status' => $request->status
        ];

        $user->update($data);
        return redirect()->back()->with('success', 'User is updated');
    }
}
