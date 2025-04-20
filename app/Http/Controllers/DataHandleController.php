<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataHandleController extends Controller
{
    public function index(){
        $datas=User::all();
        return view('customer.index',compact('datas'));
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
        ];
        $this->validate($request, $rules);
        
       $data= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'password'=>Hash::make('customer@123'),
        ]);

        return redirect()->route('customer.index')->with('success','Customer added successfully');
    }

    public function edit(User $user){
        return view('customer.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
        ]);
        $user->update($validated);
    
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }
    
    public function delete(Request $request){
        $product = User::find($request->id);

        if (!$product) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        try {
            $product->delete();
            return response()->json(['success' => 'Customer deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Customer'], 500);
        }

    }
}
