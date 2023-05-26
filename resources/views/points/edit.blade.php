@extends('layouts.app')

@section('content')
    <h1>Edit Point</h1>

    <form action="{{ route('meetings.points.update', [$meeting, $point]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $point->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $point->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Point</button>
    </form>
@endsection
