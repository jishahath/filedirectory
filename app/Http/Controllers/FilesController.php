<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['files'] = File::when(request('search'), function($q, $search){
            return $q->where('name', 'like', "%$search%");
        })->paginate(5);
        return view('files.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $files)
    {
        $request->validate([
            'name' => 'required|max:2048|mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif'
        ]);

        if($request->name->getClientOriginalName()) {
            $ext = $request->name->getClientOriginalExtension();
            $file = $request->name->getClientOriginalName();
            $request->name->storeAs('public/files', $file);
        }else {
            $file = '';
        }    
        $files->name = $file;    
        $files->title = $request->title;
        $files->save();
        return redirect()->route('files.index');
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
        $file = File::findOrFail($id);
        $file->delete();

        return redirect('/files');
    }
}
