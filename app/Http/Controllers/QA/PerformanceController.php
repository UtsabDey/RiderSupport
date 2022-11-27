<?php

namespace App\Http\Controllers\QA;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['performances'] = Performance::all();
        return view('QA.Performance.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where('role', '1')->get();
        return view('QA.Performance.add', $data);
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
            'A_id' => 'required',
            'daily_report' => 'integer|min:1|max:100',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $performance = new Performance();
        $performance->A_id = $request->A_id;
        $performance->daily_report = $request->daily_report;
        $performance->save();
        if ($performance) {
            return redirect()->route('performance.index')->with('success', 'Performance Issued Successfully!');
        }
        return redirect()->route('performance.index')->with('error', 'Failed to Issue Performance!');
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
        $data['performance'] = Performance::find($id);
        return view('QA.Performance.edit', $data);
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
            'A_id' => 'required',
            'daily_report' => 'integer|min:1|max:100',
        ]);

        // dd($validate);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $performance = Performance::find($id);
        $performance->A_id = $request->A_id;
        $performance->daily_report = $request->daily_report;

        // dd($request->all());

        if ($performance->isDirty()) {
            $performance->update();
            return redirect()->route('performance.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('performance.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Performance::find($id)->delete();
        return redirect()->back()->with('warning', 'Deleted Successfully');
    }
}
