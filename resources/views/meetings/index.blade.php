@extends('layouts.app')

@section('content')
    <h1>Meetings</h1>

    <a href="{{ route('meetings.create') }}" class="btn btn-primary mb-3">Create Meeting</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->title }}</td>
                    <td>{{ $meeting->description }}</td>
                    <td>{{ $meeting->date ? $meeting->date->format('M d, Y') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('meetings.show', $meeting) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('meetings.edit', $meeting) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('meetings.destroy', $meeting) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('meetings.points.create', $meeting) }}" class="btn btn-success">Add Point</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


