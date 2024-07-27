@extends('admin.master')
@section('title')
    Division List
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
                    <form class="form-horizontal" action="{{ route('store.division') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Front page information</h3>
                        <div class="form-group mb-3">
                            <label for="state_name" class="form-label">State Name</label>
                            <select name="state_id" id="" class="form-select">
                                <option selected>Choose A State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                            @error('state_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Division Name</label>
                            <input type="text" class="form-control @error('division_name')
                            is-invalid
                        @enderror" rows="5" name="division_name" value="{{ old('division_name') }}" id="division_name" placeholder="Division Name">
                            @error('division_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Division Image</label>
                            <input type="file" name="division_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Division Small Details</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="division_details"></textarea>
                        </div>
                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>Division Image Two</label>
                            <input type="file" name="division_image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Division Image Three</label>
                            <input type="file" name="division_image3" class="form-control">
                        </div>
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
                            <select class="form-control" name="service_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
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
                        <th>Thumb Nail</th>
                        <th>State Name</th>
                        <th>Division Name</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($divisions as $division)
                        <tr>
                            <td><img src="{{ asset($division->division_image) }}" style="height: 100px"></td>
                            <td>{{ $division->state->state_name }}</td>
                            <td>{{ $division->division_name }}</td>
                            <td>
                                @if ($division->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($division->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.division', ['id'=>$division->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
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
