<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
class ArticlesController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
         'Title'=>'required',
         'Content'=>'required',
        ]);
 
        $Articles = new Articles();
        //text data
        $Articles->Title = $request->input('Title');
        $Articles->Content = $request->input('Content');
        //dd($Articles);
        $Articles->save();
 
        return response()->json($Articles);
     }

 
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }
}
