@extends('admin.master')
@section('title')
    Property Edit
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
                    <form action="{{route('update.property')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$property->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Property Title</label>
                            <input type="text" class="form-control" rows="5" name="property_title" id="property_title" value="{{$property->property_title}}" placeholder="Property Title">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" rows="5" name="location" id="location" value="{{$property->location}}" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="number" class="form-control" rows="5" name="room_number" id="room_number" value="{{$property->room_number}}" placeholder="Room Number">
                        </div>
                        <div class="form-group">
                            <label>Land area</label>
                            <input type="text" class="form-control" rows="5" name="land_area" id="land_area" value="{{$property->land_area}}" placeholder="Land area">
                        </div>
                        <div class="form-group">
                            <label>Build year</label>
                            <input type="text" class="form-control" rows="5" name="build_year" id="build_year" value="{{$property->build_year}}" placeholder="Build year">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" rows="5" name="price" id="price" value="{{$property->price}}" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($property->image)}}" class="mb-2" height="100" width="100" alt="">

                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <img src="{{asset($property->banner_image)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Property Details</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="property_details">{!! $property->property_details !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="property_home">
                                <option value="1" @if ($property->property_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($property->property_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($property->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($property->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>                </div>
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
