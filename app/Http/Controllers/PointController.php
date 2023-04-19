<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Point;

class TalkingPointController extends Controller
{
    public function index(Meeting $meeting)
    {
        $points = $meeting->points;

        return view('points.index', compact('points', 'meeting'));
    }

    public function create(Meeting $meeting, Point $parent = null)
    {
        $parent_id = $parent ? $parent->id : null;

        return view('points.create', compact('meeting', 'parent_id'));
    }

    public function store(Meeting $meeting, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:points,id'
        ]);

        $point = $meeting->points()->create($data);

        return redirect()->route('meetings.points.index', $meeting);
    }

    public function edit(Meeting $meeting, Point $point)
    {
        return view('points.edit', compact('meeting', 'point'));
    }

    public function update(Meeting $meeting, Point $point, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:points,id'
        ]);

        $point->update($data);

        return redirect()->route('meetings.points.index', $meeting);
    }

    public function destroy(Meeting $meeting, Point $point)
    {
        $point->delete();

        return redirect()->route('meetings.points.index', $meeting);
    }
}



