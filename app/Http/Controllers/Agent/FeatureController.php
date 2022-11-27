<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\RCR;
use App\Models\SOP;
use App\Models\Tool;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Agent.dashboard');
    }

    public function showSop()
    {
        $data['sops'] = SOP::all();
        return view('Agent.SOP.index', $data);
    }

    public function showTool()
    {
        $data['tools'] = Tool::all();
        return view('Agent.Tools.index', $data);
    }

    public function showRcr()
    {
        $data['rcrs'] = RCR::all();
        return view('Agent.RCR.index', $data);
    }

    public function showNotes()
    {
        $data['notes'] = Note::all();
        return view('Agent.Notes.index', $data);
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
}
