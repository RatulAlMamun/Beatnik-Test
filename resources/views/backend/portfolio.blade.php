@extends('backend.layout.master')
@section('title', 'Beatnik | Portfolio')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 table-heading">Dashboard / Portfolio</h2>
                <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#addportfolio"><i class="fas fa-plus-circle"></i> Add Portfolio</button>
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
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Project Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portfolios as $key => $portfolio)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td data-search="{{ $portfolio->name }}">{{ $portfolio->name }}</td>
                            <td>{{ str_limit($portfolio->description, 20) }}</td>
                            <td>{{ $portfolio->category }}</td>
                            <td>{{ $portfolio->client }}</td>
                            <td data-order="{{ strtotime($portfolio->created_at) }}">{{ $portfolio->created_at->format('F j, Y') }}</td>
                            <td>
                                <a href="{{ $portfolio->url }}" class="btn btn-primary" target="_blank">Link</a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#editportfolio{{ $portfolio->id }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('portfolio.destroy', ['id'=>$portfolio->id]) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit PORTFOLIO MODAL -->
                        <div class="modal fade" id="editportfolio{{ $portfolio->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('portfolio.edit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="projectName">Project Name</label>
                                            <input type="text" name="name" class="form-control" id="projectName" placeholder="Project Name" value="{{ $portfolio->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Project Category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option disabled selected>-- Choose Project Category --</option>
                                                <option value="App" @if ($portfolio->category == "App") {{ 'selected' }} @endif>App Development</option>
                                                <option value="Web" @if ($portfolio->category == "Web") {{ 'selected' }} @endif>Web Development</option>
                                                <option value="Card" @if ($portfolio->category == "Card") {{ 'selected' }} @endif>Card Design</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="client">Client</label>
                                            <input type="text" name="client" class="form-control" id="client" placeholder="Client Company/Client Name" value="{{ $portfolio->client }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">Project URL Link</label>
                                            <input type="text" name="url" class="form-control" id="url" placeholder="e.g: https://example.com" value="{{ $portfolio->url }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Project Images (<small class="text-info">must include 3 images</small>)</label>
                                            <input type="file" id="images" name="images[]" class="form-control" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Project Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3">{{ $portfolio->description }}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $portfolio->id }}" name="id">
                                    <input type="hidden" value="{{ $portfolio->images }}" name="oldimages">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div><!-- ./End Edit PORTFOLIO MODAL -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ADD PORTFOLIO MODAL -->
<div class="modal fade" id="addportfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" name="name" class="form-control" id="projectName" placeholder="Project Name">
            </div>
            <div class="form-group">
                <label for="category">Project Category</label>
                <select class="form-control" name="category" id="category">
                    <option disabled selected>-- Choose Project Category --</option>
                    <option value="App">App Development</option>
                    <option value="Web">Web Development</option>
                    <option value="Card">Card Design</option>
                </select>
            </div>
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" name="client" class="form-control" id="client" placeholder="Client Company/Client Name">
            </div>
            <div class="form-group">
                <label for="url">Project URL Link</label>
                <input type="text" name="url" class="form-control" id="url" placeholder="e.g: https://example.com">
            </div>
            <div class="form-group">
                <label for="images">Project Images (<small class="text-info">must include 3 images</small>)</label>
                <input type="file" id="images" name="images[]" class="form-control" multiple>
            </div>
            <div class="form-group">
                <label for="description">Project Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
