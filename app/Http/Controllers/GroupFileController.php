<?php

namespace App\Http\Controllers;

use App\Models\Group_file;
use Illuminate\Http\Request;

class GroupFileController extends Controller
{

    public function store(Request $request)
    {
        $input = $request->all();
//        $validator = Validator::make($input,[
//            'name' => 'required',
//            'user_id' => 'required',
//            'file_id' => 'required'
//        ]);
        $group = Group_file::create($input);
        return response()->json([
            "message" => "User Added successfully",
            "Data" => $group,
        ]);
    }

}
