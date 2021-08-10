<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::paginate(9);

        return view('animals.index',['animals'=>$animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animals = new Animal();
        $animals->name = $request->input('name');
        $animals->image = 'https://placeimg.com/640/480/animals/'.rand(1,1000);

        $rs = $animals->save();

        if ($rs) {  
            return redirect()->back()->with('suc', 'Success!');
        }else{
            return redirect()->back()->withInput($request->input())
                                        ->with('err', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animals = Animal::find($id);

        return view('animals.show',['animals'=>$animals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animals = Animal::find($id);

        return view('animals.edit',['animals'=>$animals]);
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
        $animals = Animal::find($id);
        $animals->name = $request->input('name');


        $rs = $animals->save();

        if ($rs) {  
            return redirect()->back()->with('suc', 'Success!');
        }else{
            return redirect()->back()->withInput($request->input())
                                        ->with('err', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $key = $request->input('key');
        $rs = Animal::where('name', 'like', '%'.$key.'%')->paginate(9);
        $rs->appends(array ('key' => $key));
        
        return view('animals.search', ['animals'=>$rs]);

    }
}
