@extends('backend.layout.master')
@section('title', 'Beatnik | Subscriber')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 table-heading">Dashboard / Subscriber</h2>
            </div>
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subscriber Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $key => $subscriber)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td data-search="{{ $subscriber->email }}">{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
