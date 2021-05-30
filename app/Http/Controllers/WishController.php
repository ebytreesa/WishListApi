<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WishController extends Controller
{
    // Get all wishes
    public function index()
    {
        try
        {
            $wishes = Wish::all();       
        }
        catch(Exception $ex){
            return $this->errorResponse('DB error', $ex);
        }
        return $this->successResponse($wishes, 'Data retrieved successfully', 200);       
    }

    // Create wish

    public function create(Request $request)
    {
        $input = $request->all();    
        $validator = $this->validateData($input);
        if($validator->fails())
        {
            return $this->errorResponse('Validation error',  $validator->errors());
            //return response()->json(['error' => $validator->errors()]);
        }     
        try
        {
            $wish = Wish::Create($input);
        }
        catch(Exception $ex)
        {
            return $this->errorResponse('DB error', $ex);
        }        
        return $this->successResponse($wish, 'Data created successfully', 201);
       
    }

    // Update wish

    public function update(Request $request, $id)
    {
        $wish = Wish::find($id) ;
        $input = $request->all();    
        $validator = $this->validateData($input);

        if($validator->fails())
        {
            return $this->errorResponse('Validation error',  $validator->errors());
          // return response()->json(['error' => $validator->errors()]);
        }        
        try{
            $wish->update($input);
        }
        catch(Exception $ex)
        {
            return $this->errorResponse('DB error', $ex);
        }  

        return $this->successResponse($wish, 'Data updated successfully', 200);
    }

    // Delete wish

    public function destroy($id)
    {
        try
        {
            Wish::destroy($id);
        }
        catch(Exception $ex)
        {
            return $this->errorResponse('DB error', $ex);
        }  
        return $this->successResponse([], 'Data deleted successfully', 204);       
        
    }


    private function validateData($input)
    {
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required' 
          ]);
        return $validator;
    }

    private function successResponse($data, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    private function errorResponse($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['error'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
