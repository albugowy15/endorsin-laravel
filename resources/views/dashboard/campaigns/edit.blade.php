@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit This Campaign</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/campaigns/{{ $campaign->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required
                    autofocus value="{{ old('title', $campaign->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                {{-- <input type="text" class="form-control" id="description" name="description"> --}}
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30"
                    rows="10" required>{{ old('description', $campaign->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fee" class="form-label">Fee</label>
                <input type="text" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee" required
                    value="{{ old('fee', $campaign->fee) }}">
                @error('fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"
                    name="duration" required value="{{ old('duration', $campaign->duration) }}">
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
