<?php

namespace App\Http\Controllers;

use App\Models\ajax;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function click(Request $request){
        $name = $request->input('ten');
        $age = $request->input('tuoi');
        
        if($request->ajax()){
            ajax::nhan($name,$age);
        
        }else{
            echo "<p style='color:green'>ca</p>";
            
        }
       
        
    }
}
