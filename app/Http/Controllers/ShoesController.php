<?php

namespace App\Http\Controllers;

use App\Models\Shoes;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function all_shoes()
    {
        $shoes = Shoes::all();
        return response()->json([
            'shoes' => $shoes,
            'status' => 200,
            'message' => 'All Shoes'
        ]);
    }
    public function shoes($id)
    {
        $shoes = Shoes::find($id);
        return response()->json([
            'shoes' => $shoes,
            'status' => 200,
            'message' => 'Shoes '.$shoes->id
        ]);
    }
    public function add(Request $request)
    {
        $shoes = new Shoes([
            'image' => $request->image,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'color' => $request->color
        ]);
        $shoes->save();
        if ($shoes) {
            return response()->json([
                'Message' => 'Added Sucessfully'
            ]);
        } else {
            return response()->json([
                'Message' => 'Added Failled'
            ]);
        }
    }
}
