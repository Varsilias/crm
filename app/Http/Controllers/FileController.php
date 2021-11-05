<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.file.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('dashboard.file.create')->with([
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'project_id.integer' => 'Please select a project or proceed to create one',
        ];


        $validator = Validator::make($request->all(), [
            'project_id' => 'required|integer',
            'file' => 'required|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // File::create([
        //     'project_id' => $validated['project_id'],
        //     'filename' => $filename,
        //     'file_url' => $S3Url
        // ]);

        // return redirect()->back()->with([
        //     'success' => 'File uploaded successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('file')) {
    //         $filename = $request->file('file')->getClientOriginalName();
    //         $file = $request->file('file')->getRealPath();
    //         $response = Cloudinary::uploadFile($file)->getSecurePath();
    //         dd($response);
    //         // $filename = $file->getClientOriginalName();
    //         // $folder = uniqid() . '_' . now()->timestamp;
    //         // $file->storeAs('private/files/' . $folder, $filename);

    //         // return "$filename";
    //     }

    //     // return '';
    // }
}
