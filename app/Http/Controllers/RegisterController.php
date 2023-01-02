<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $registers=Register::all();
        return view('register.index',compact('registers'));
    }
    public function create(Request $request){
       $register=Register::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'tax'=>$request->tax,
            'sellers_permit'=>$request->sellers_permit,
            'city'=>$request->city,
            'company_name'=>$request->company_name,
            'password'=>$request->password,
            'confirm_password'=>$request->confirm_password,
        ]);
        return response()->json($register);
    }
    public function edit(Request $request){
        $register = Register::find($request->id);
        return response()->json($register);
    }
    public function updateregister(Request $request){
      
        $product=  Register::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'sellers_permit' => $request->sellers_permit,
           
        ]);

        return response()->json($product);
    }
}
