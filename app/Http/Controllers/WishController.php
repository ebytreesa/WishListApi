<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WishController extends Controller
{
    public function index()
    {
        return Wish::all();
    }

    public function create(Request $request)
    {
      $input = $request->all();
      $validator = Validator::make($input, [
        'title' => 'required',
        'description' => 'required',
        'link' => 'required' 
      ]);
      if($validator->fails())
      {
        return response()->json(['error' => $validator->errors()], 200);
      }        

        $wish = Wish::Create($input);
        $response = [
            'success' => true,
            'message' => 'Data created successfully',
            'data' => $wish
        ];
        return response()->json($response,201);
    }
}
