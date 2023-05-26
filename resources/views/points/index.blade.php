@extends('layouts.app')

@section('content')
    <h1>Points</h1>

    <a href="{{ route('meetings.points.create', $meeting) }}" class="btn btn-primary mb-3">Create Point</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meeting->points as $point)
                <tr>
                    <td>{{ $point->title }}</td>
                    <td>{{ $point->description }}</td>
                    <td>
                        <a href="{{ route('meetings.points.edit', [$meeting, $point]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('meetings.points.destroy', [$meeting, $point]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
