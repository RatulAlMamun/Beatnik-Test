@extends('backend.layout.master')
@section('title', 'Beatnik | Message')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="d-flex justify-content-between">
              <h2 class="mb-3 table-heading">Dashboard / Messages</h2>
            </div>
            @if(session('success'))
              <div class="alert alert-success alert-dismissible m-3 lead">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <p>{{ session('success') }}</p>
              </div>
            @endif
            @if($errors->any())
              @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible m-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $error }}</strong>
                </div>
              @endforeach
            @endif
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $key => $message)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
