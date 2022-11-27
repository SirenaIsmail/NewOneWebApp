<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return response()->json(
            [
                "message" => "Group list",
                "Data" => $groups,
            ]
        );
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
            'user_id' => 'required',
            'file_id' => 'required'
        ]);
        $group = Group::create($input);
        return response()->json([
            "message" => "group created successfully",
            "Data" => $group,
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
        $group = Group::find($id);
        if ($group == null)
            return response()->json(["message" => "group not found"]);
        else
            return response()->json([
                "data" => $group,
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
            'user_id' => 'required',
            'file_id' => 'required'
        ]);

        $group = Group::find($id);
        $group->name = $input['name'];
        $group->user_id = $input['user_id'];
        $group->file_id = $input['file_id'];
        $group->save();
        return response()->json([
            "message" => "group updated successfully.",
            "data" => $group
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

        $group = Group::find($id);
        $group->delete();
        return response()->json([
            "message" => "group deleted",
        ]);
    }
}
