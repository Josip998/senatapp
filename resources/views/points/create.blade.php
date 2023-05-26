@extends('layouts.app')

@section('content')
    <h1>Create Point</h1>

    <form action="{{ route('meetings.points.store', $meeting) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Point</button>
    </form>
@endsection
