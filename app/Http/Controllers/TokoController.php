<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::find(1);
        return view('toko.index', compact('toko'));
    }
    public function update(Request $request)
    {
        $toko = Toko::get()->first();
        if($request->logo){
            $image = $request->logo;
            $image_path = $image->store('logo', 'public');
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'logo' => $image_path,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter
            ];
        }else{
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter
            ];
        }

        $toko->update($data);
        if($toko){
            return redirect()->back()->with('success', 'Update Toko Berhasil');
        }else{
            return redirect()->back()->with('error', 'UPdate failed');
        }
    }
}
