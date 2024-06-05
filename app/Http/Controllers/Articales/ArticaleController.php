<?php

namespace App\Http\Controllers\Articales;

use App\Http\Controllers\Controller;
use App\Models\Articale;
use Illuminate\Http\Request;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articales=Articale::get();
        return view('index',compact('articales'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Articales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articales,title|string',
            'file.*' => 'required|file|max:50120'
        ]);
        $title = $request['title'];

        $files=[];
        foreach($request->file('file') as $file){
        $path=$file->store('Upload','public');
        $files[]=$path;
        }
        $fileJson=json_encode($files);

        $articales=Articale::create([
            'title'=>$title,
            'paths'=>$fileJson
        ]);
        return redirect()->route('Articales.index')->with('success','The Articale Created Successfuly');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articale=Articale::find($id);
        return view('Articales.edit',compact('articale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Articale = Articale::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'file.*' => 'required|file|max:2048',
        ]);
        $Articale->title = $request['title'];
        if ($request->hasFile('file')) {
            $files = [];
            foreach ($request->file('file') as $file) {
                $path = $file->store('Upload', 'public');
                $files[] = $path;
            }
            $fileJson=json_encode($files);
            $Articale->paths = $fileJson;
        }
        $Articale->save();
        return redirect()->route('Articales.index')->with('success', 'Articale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Articale = Articale::findOrFail($id);
        $Articale->delete();
        return redirect()->route('Articales.index')->with('success', 'Articale Deleted successfully');
    }
}
