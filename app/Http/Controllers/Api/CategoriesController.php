<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function allCategories(){
        $allCategories = Categories::query()->latest()->get();
        return response()->json([
            'code' => 200,
            'message' => "Get Data Categories",
            "data" => $allCategories
        ]);
    }

    public function createCategories(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            
            
        ]);

        if($validator->fails()){
            return response()->json([
                'code' => 400,
                'data' => $validator->messages()
            ], 400);
        }

        Categories::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'birth' => $request->birth,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            
            
        ]);

        return response()->json([
            'code' => 201,
            'message' => "Successfully Categories Created!"
        ], 201);
    }

    public function updateCategories(Request $request, $categoriesId)
    { 
        $findCategories = Categories::find($categoriesId);
        if(!$findCategories){
            return response()->json([
                'code' => 404,
                'message' => "Categories Id Not Found"
            ]);
        }
        $findCategories->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'birth' => $request->birth,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
            
            
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
            
        ]);

        if($validator->fails()){
            return response()->json([
                'code' => 400,
                'data' => $validator->messages()
            ], 400);
        }
        return response()->json([
            'code' => 201,
            'message' => "Successfully Categories " . $findCategories->name . " updated!"
        ], 201);
    }

    public function deleteCategories($categoriesId)
    { 
        $findCategories = Categories::find($categoriesId);
        if(!$findCategories){
            return response()->json([
                'code' => 404,
                'message' => "Categories Id Not Found"
            ]);
        }
        
        $findCategories->delete();

        return response()->json([
            'code' => 200,
            'message' => "Successfully Categories " . $findCategories->name . " deleted!"
        ], 200);
    }
}
