<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepositoryController extends Controller
{
    public function index()
    {
        $repositories = Repository::all();
        return response()->json([
            "repositories" => $repositories
        ]);
    }

    public function store(Request $request) {
        $rules = [
            "title" => ['required'],
            "description" => ['required'],
            "year"  => ['required', 'numeric'],
            "author"  => ['required'],
        ];
        
        $validated = Validator::make($request->all(), $rules);

        if($validated->fails()) {
            return response()->json([
                "errors" => $validated->errors()
            ], 401);
        }
        $new = Repository::create($request->all());
        return response()->json([
            "message" => "Repository created successfully",
        ]);
    }

    public function show($id) {
        $repository = Repository::find($id);
        return response()->json([
            "repository" => $repository
        ]);
    }


    public function destroy($id) {
        $repository = Repository::find($id);
        $repository->delete();
        return response()->json([
            "message" => "Repository deleted successfully"
        ]);
    }
    
    public function update(Request $request) {
        $rules = [
            "title" => ['required'],
            "description" => ['required'],
            "year"  => ['required', 'numeric'],
            "author"  => ['required'],
        ];

        $validated = Validator::make($request->all(), $rules);
        if($validated->fails()) {
            return response()->json([
                "errors" => $validated->errors()
            ], 401);
        }
        Repository::where('id', $request->id)->update($request->all());
        return response()->json([
            "message" => "Repository updated successfully",
        ]);
    }
}
