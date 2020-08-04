<?php

namespace App\Http\Controllers;

use App\info;
use Illuminate\Http\Request;
use App\Http\Requests\InfoFormRequest;

use App\Exceptions\CustomException;
use App\Exceptions\ValidationException;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $infos = Info::all();
        return view('info.index')->with('infos', $infos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( InfoFormRequest $request)
    {
        //

        $validated = $request->validated();

        $info = new Info($validated);

        $info->info_name = strtolower($info->info_name);
        $info->info = ucwords($info->info);
        $info->author = strtolower($info->author);

        $info->save();
        return redirect(route('info.index'))->with('status', 'Informatlion Succeffully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(info $info)
    {
        //
        return view('info.show')->with('info' , $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(info $info)
    { 
        //
        return view('info.update')->with('info', $info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\info  $info
     * @return \Illuminate\Http\Response
     */
    public function update( InfoFormRequest $request, info $info)
    {
        //
        $validated = $request->validated();

        $info->info_name = strtolower($validated['info_name']);
        $info->info = ucwords($validated['info']);
        $info->author = strtolower($validated['author']);

        $info->save();
        return redirect(route('info.index'))->with('status', 'Student '.$info->id.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(info $info)
    {
        //
        try {

            $id = $info->id;
            $info->delete();
            return redirect(route('info.index'))->with('status', 'info '.$id.' Deleted Successfully');
            
        } catch (\Exception $e) {
            echo $e;
            
        }
    }
}
