@extends('admin.master')
@section('title')
    Division Edit
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
                    <form action="{{route('update.division')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$division->id}}" name="id">
                        <h3>Front page information</h3>
                        <div class="form-group mb-3">
                            <label for="state_name" class="form-label">State Name</label>
                            <select name="state_id" id="" class="form-select">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" @if ($state->id == $division->state_id)
                                        selected
                                    @endif>{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Division Name</label>
                            <input type="text" class="form-control" rows="5" name="division_name" id="division_name" value="{{ $division->division_name }}" placeholder="Division Name">
                        </div>
                        <div class="form-group">
                            <label>Division Image</label>
                            <input type="file" name="division_image" class="form-control">
                        </div>
                        <img src="{{asset($division->division_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Division Small Details</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="division_details"></textarea>
                        </div>
                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>Division Image Two</label>
                            <input type="file" name="division_image2" class="form-control">
                        </div>
                        <img src="{{asset($division->division_image2)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Division Image Three</label>
                            <input type="file" name="division_image3" class="form-control">
                        </div>
                        <img src="{{asset($division->division_image3)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Division Details</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="division_details2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Division Details</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="division_details3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="division_home">
                                <option value="1" @if ($division->division_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($division->division_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($division->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($division->status == 0) selected @endif>Deactive</option>
                            </select>
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
