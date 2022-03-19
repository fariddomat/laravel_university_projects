<?php

namespace App\Http\Controllers\Admin;

use App\Collegue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CollegueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collegues=Collegue::paginate(5);
        return view('admin.collegues.index', compact('collegues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collegues.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        Collegue::create([
            'name'=>$request->name
        ]);
        return redirect()->route('admin.collegues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collegue = Collegue::find($id);
        if ($collegue) {

            return json_encode([
                'message' => 'success',
                'category' => $collegue
            ]);
        } else
            return response()->json(['message' => 'error'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collegue=Collegue::find($id);
        return view('admin.collegues.edit', compact('collegue'));
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
        $collegue = Collegue::find($id);
        if ($collegue) {
            $collegue->update(request()->all());
        return redirect()->route('admin.collegues.index');

        } else
            return response()->json(['message' => 'error'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collegue = Collegue::find($id);
        if ($collegue) {
            $collegue->delete();
            return redirect()->route('admin.collegues.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
