@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Campaign</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="table-responsive col-lg-10">
        <a href="/dashboard/campaigns/create" class="btn btn-primary my-3">Create new Campaign</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ Str::limit($campaign->description) }}</td>
                        <td>Rp {{ $campaign->fee }},00</td>
                        <td>{{ $campaign->duration }} days</td>
                        <td>{{ $campaign->created_at }}</td>
                        <td style="min-width: 110px;">
                            <a href="/dashboard/campaigns/{{ $campaign->id }}" class="badge btn-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/campaigns/{{ $campaign->id }}/edit" class="badge btn-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/campaigns/{{ $campaign->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
