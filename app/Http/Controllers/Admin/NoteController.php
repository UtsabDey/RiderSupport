<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    
    public function index()
    {
        $data['notes'] = Note::all();
        return view('Admin.Notes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Notes.add');
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
            'reason' => 'required|string',
            'notes' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $note = new Note();
        $note->reason = $request->reason;
        $note->notes = $request->notes;
        $note->save();
        if ($note) {
            return redirect()->route('notes.index')->with('success', 'Notes Added Successfully!');
        }
        return redirect()->route('notes.index')->with('error', 'Failed to Create Notes!');
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
        $data['note'] = Note::find($id);
        return view('Admin.Notes.edit', $data);
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
            'reason' => 'required|string',
            'notes' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $note = Note::find($id);
        $note->reason = $request->reason;
        $note->notes = $request->notes;

        if ($note->isDirty()) {
            $note->update();
            return redirect()->route('notes.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('notes.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::find($id)->delete();
        return redirect()->back()->with('warning', 'Deleted Successfully');
    }
}
