@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <a href="/dashboard/campaigns" class="btn btn-success my-3"><span data-feather="arrow-left"></span> Back to
                    all my campaign</a>
                <a href="/dashboard/campaigns/{{ $campaign->id }}/edit" class="btn btn-warning my-3"><span
                        data-feather="edit"></span> Edit this campaign</a>
                <form action="/dashboard/campaigns/{{ $campaign->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span> Delete this campaign</button>
                </form>
                <h1 class="mb-3">{{ $campaign->title }}</h1>

                <p>Created by {{ $campaign->user->name }}</p>

                <h2>Description</h2>
                <p>{{ $campaign->description }}</p>

                <h2>Fee</h2>
                <p>Rp {{ $campaign->fee }},00</p>

                <h2>Duration</h2>
                <p>{{ $campaign->duration }} days</p>
            </div>
        </div>
    </div>
@endsection
