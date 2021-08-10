<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $customers = Customers::paginate(10);
        return view('index',['customers'=>$customers]);
    }

    public function store(Request $request){
        $image = $request->file('image');
        $nameOfImage = time().'.'.$image->getClientOriginalExtension();
        $image->move('images', $nameOfImage);

        $customers = new Customers();
        $customers->name = $request->input('name');
        $customers->gender = $request->input('gt');
        $customers->phone = $request->input('sdt');
        $customers->email = $request->input('email');
        $customers->avatar = $nameOfImage;

        $rs = $customers->save();

        if ($rs) {
            return redirect()->back()->with('suc', 'Success!');
        }else{
            return redirect()->back()->withInput($request->input())->with('err', 'Error!');
        }
    }

    public function search(Request $request){
        $key = $request->input('key');
        $rs = Customers::where('name', 'like', '%'.$key.'%')->paginate(10);
        $rs->appends(array('key' => $key));

        return view('search', ['customers'=>$rs]);
    }
}
