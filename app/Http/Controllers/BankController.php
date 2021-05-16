<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1',
            'owner' => 'required|min:3',
            'account_number' => 'required|min:10|max:17'
        ]);

        Bank::create([
            'name' => $request->name,
            'owner' => $request->owner,
            'account_number' => $request->account_number
        ]);
        return redirect()->back()->with('success', 'Bank is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banks = Bank::all();
        return view('pondok_kampuh.bank', compact('banks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:1',
            'owner' => 'required|min:3',
            'account_number' => 'required|min:10|max:17'
        ]);

        $data = [
            'name' => $request->name,
            'owner' => $request->owner,
            'account_number' => $request->account_number
        ];

        
        $bank = Bank::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Bank is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Bank is Deleted');
    }
}
