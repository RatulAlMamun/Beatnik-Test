@extends('backend.layout.master')
@section('title', 'Beatnik | FAQ')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 table-heading">Dashboard / FAQs</h2>
                <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#addfaq"><i class="fas fa-plus-circle"></i> Add FAQ</button>
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
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $key => $faq)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td data-search="{{ $faq->question }}">{{ $faq->question }}</td>
                            <td data-search="{{ $faq->answer }}">{{ $faq->answer }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#editfaq{{ $faq->id }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('faq.destroy', ['id'=>$faq->id]) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit FAQs MODAL -->
                        <div class="modal fade" id="editfaq{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit FAQs</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="{{ route('faq.edit') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <textarea class="form-control" name="question" id="question" rows="3">{{ $faq->question }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">Answer</label>
                                            <textarea class="form-control" name="answer" id="answer" rows="3">{{ $faq->answer }}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $faq->id }}" name="id">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div><!-- ./End Edit FAQs MODAL -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ADD FAQs MODAL -->
<div class="modal fade" id="addfaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" name="question" id="question" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
