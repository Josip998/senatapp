<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Material;

class MaterialController extends Controller
{
    public function create(Meeting $meeting)
    {
        return view('materials.create', compact('meeting'));
    }

    public function store(Request $request, Meeting $meeting)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'file' => 'required|file|max:10240', //10 MB limit
        ]);

        $file = $validatedData['file'];
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file_path = $file->storeAs('materials', $file_name);

        $material = new Material([
            'name' => $validatedData['name'],
            'file_path' => $file_path,
        ]);
        $point_id = $request->input('point_id');
        $material->point_id = $point_id;

        $meeting->materials()->save($material);

        return redirect()->route('meetings.show', $meeting);
    }

    public function edit(Meeting $meeting, Material $material)
    {
        return view('materials.edit', compact('meeting', 'material'));
    }

    public function update(Request $request, Meeting $meeting, Material $material)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $material->name = $validatedData['name'];

        $material->save();

        return redirect()->route('meetings.show', $meeting);
    }

    public function destroy(Meeting $meeting, Material $material)
    {
        $material->delete();

        return redirect()->route('meetings.show', $meeting);
    }
}
