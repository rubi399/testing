<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getall()
    {
        $products = Product::all();
        return response()->json($products);
     }

    public function add(Request $request)
    {
        //validation
        $this->validate($request,[
         'Title'=>'required',
         'Price'=>'required',
         'Photo'=>'required',
         'Description'=>'required'
         
        ]);
 
        $product = new Product();
        
        //images upload
        if($request->hasFile('Photo')){
         $file = $request->file('Photo');
         $allowedfileExtention = ['pdf','png','jpeg'];
         $extention = $file->getClientOriginalExtension();
         $check = in_array($extention,$allowedfileExtention);
 //dd($request);
         //duplicate value & move into Public directory
         if($check){
             $name = time() . $file->getClientOriginalName();
             $file->move('images',$name);
             $product->Photo = $name;
         }
        }
        //text data
        $product->Title = $request->input('Title');
        $product->Price = $request->input('Price');
        $product->Description = $request->input('Description');
        //dd($request);
        $product->save();
 
        return response()->json($product);
     }

    public function get($id)
    {
        //dd($id);
        $this->post = Product::find($id);
        //dd($this->post);
        // return response()->json($product);
     }

    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request,[
            'Title'=>'required',
            'Price'=>'required',
            'Description'=>'required'
           ]);

           $product = Product::find($id);
    
           //images upload
           if($request->hasFile('Photo')){
            $file = $request->file('Photo');
            $allowedfileExtention = ['pdf','png','jpg'];
            $extention = $file->getClientOriginalExtension();
            $check = in_array($extention,$allowedfileExtention);
    
            //duplicate value & move into Public directory
            if($check){
                $name = time() . $file->getClientOriginalName();
                $file->move('images',$name);
                $product->Photo = $name;
            }
           }
           //text data
           $product->Title = $request->input('Title');
           $product->Price = $request->input('Price');
           $product->Description = $request->input('Description');
           $product->save();
    
           return response()->json($product);
    }

}
