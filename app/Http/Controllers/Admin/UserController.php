<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        return view('admin.user.index', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pointer = 'create';
        return view('admin.user.form',compact('pointer')); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->newPassword)
        ];
        // dd($data);
        $save = User::create($data);
        if($save){
            return redirect()->route('user.index')->with(['success'=>'User create successfully!!']);
        }else{
            return redirect()->route('user.index')->with(['error'=>'User create failed!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('admin.user.show', compact('user')); 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pointer = 'edit';
        $user = User::find($id);
        // dd($user);
        return view('admin.user.form', compact('user','pointer')); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $save = $user->save();
        if($save){
            return redirect()->route('user.index')->with(['success'=>'User edit successfully!!']);
        }else{
            return redirect()->route('user.index')->with(['error'=>'User edit failed!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //find user by ID
        $user = User::findOrFail($id);

        //delete product
        $user->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
