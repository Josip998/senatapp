<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();

        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        $meeting = Meeting::create($data);

        return redirect()->route('meetings.index');
    }

    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

    public function edit(Meeting $meeting)
    {
        return view('meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        $meeting->update($data);

        return redirect()->route('meetings.index');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return redirect()->route('meetings.index');
    }

    public function renderIndex()
    {
        return view('meetings.index');
    }

    public function renderCreate()
    {
        return view('meetings.create');
    }

    public function renderEdit(Meeting $meeting)
    {
        return view('meetings.edit', compact('meeting'));
    }
}

