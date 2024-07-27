@extends('admin.master')
@section('title')
    State List
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('state.store') }}" method="POST">
                        @csrf
                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>State Name</label>
                            <input type="text" class="form-control @error('state_name')
                            is-invalid
                        @enderror" rows="5" name="state_name" value="{{ old('state_name') }}" id="state_name" placeholder="State Name">
                            @error('state_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check form-switch mt-4">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus" checked>
                            <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>SL/No</th>
                        <th>State Name</th>
                        <th>State Slug</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($states as $state)
                        <tr>
                            <th scope="row">{{ $states->firstItem()+$loop->index }}</th>
                            <td>{{ $state->state_name }}</td>
                            <td>{{ $state->state_slug }}</td>
                            <td>
                                @if ($state->is_active == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Setting
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('state.edit', $state->state_slug) }}">Edit</a></li>
                                        <li>
                                            <form action="{{ route('state.destroy', $state->state_slug) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item show_confirm">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
