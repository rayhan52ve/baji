@extends('admin.master')
@section('title')
    State Edit
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
                    <form action="{{route('state.update', $state->state_slug)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>State Name</label>
                            <input type="text" class="form-control" rows="5" name="state_name" id="state_name" value="{{$state->state_name}}" placeholder="State Name">
                        </div>
                        <div class="form-check form-switch mt-4">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                            @if ($state->is_active)
                            checked
                        @endif>
                            <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
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
