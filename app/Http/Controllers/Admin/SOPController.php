<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SOP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SOPController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $data['sops'] = SOP::all();
        return view('Admin.SOP.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.SOP.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'link' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $sop = new SOP();
        $sop->title = $request->title;
        $sop->link = $request->link;
        $sop->save();
        if ($sop) {
            return redirect()->route('sop.index')->with('success', 'SOP Link Added Successfully!');
        }
        return redirect()->route('sop.index')->with('error', 'Failed to Create SOP Link!');
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
        $data['sop'] = SOP::find($id);
        return view('Admin.SOP.edit', $data);
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
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'link' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $sop = SOP::find($id);
        $sop->title = $request->title;
        $sop->link = $request->link;

        if ($sop->isDirty()) {
            $sop->update();
            return redirect()->route('sop.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('sop.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SOP::find($id)->delete();
        return redirect()->back()->with('warning', 'Deleted Successfully');
    }
}
