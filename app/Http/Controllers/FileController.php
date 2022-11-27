<?php

namespace App\Http\Controllers;

use App\Models\File;
use Dotenv\Validator;
use Illuminate\Http\Request;

class FileController extends Controller
{



    public function index()
    {
        $files = File::all();
        return response()->json([
            "message" => "Files list",
            "Data" => $files,
        ]);
    }

    public function store(Request $request){
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('Files/'), $imageName);
        //$id=Auth::id();
        //$user=User::find(Auth::user()->id);
        $File=new File([
            "name"=>$request->name,
            "path"=>$imageName,
            "status"=>$request->status,
            "user_id"=>1,
        ]);
        $File->save();

    }

    public function getDownload()
    {
        //$file->getPath()
       // $path = public_path('app/Files' . $file->path);
        $headers = array(
            'Content-Type: application/png',
        );
        return response()->download(public_path('Files/Screenshot (5).png'));
      //  return response()->download($path, $file->name, $headers);
    }



    public function show1($id)
    {
        $file = File::find($id);
        if ($file == null)
            return response()->json(["message" => "File not found"]);
        else
            return response()->json([
                "Data" => $file,
            ]);
    }

    public function store2(Request $request)
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

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return response()->json([
            "message" => "file deleted",
        ]);
    }

}
