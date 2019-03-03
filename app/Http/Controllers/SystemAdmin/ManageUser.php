<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageUser extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('systemAdmin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systemAdmin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        User::create($input);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $user = User::findOrFail($id);
            return view('systemAdmin.users.edit', compact('user'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('msgFail', "loi nhap");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $input = $request->all();
        //dd($input);
        User::find($id)->update($input);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('messageD', 'Xoa Thanh Cong');
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageD', 'Xoa That Bai');
        }
    }
}
