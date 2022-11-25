<?php

namespace App\Http\Controllers;

use App\Models\File;
use Dotenv\Validator;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return response()->json([
           "message" => "Files list",
           "Data" => $files,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
           'name' => 'required',
           'path' => 'required',
           'status' => 'required',
            'user_id' => 'required',
        ]);
        $file = File::create($input);
        return response()->json([
            "message" => "file is created successfully",
            "Data" => $file,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        if ($file == null)
            return response()->json(["message" => "File not found"]);
        else
            return response()->json([
                "Data" => $file,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'path' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ]);
        $file = File::find($id);
        $file->name = $input['name'];
        $file->path = $input['path'];
        $file->status = $input['status'];
        $file->user_id = $input['user_id'];
        $file->save();
        return response()->json([
            "message" => "file updated successfully.",
            "data" => $file
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return response()->json([
            "message" => "file deleted",
        ]);
    }
}
