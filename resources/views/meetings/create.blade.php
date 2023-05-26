@extends('layouts.app')

@section('title', 'Create Meeting')

@section('content')
    <h1>Create Meeting</h1>

    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}">
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

