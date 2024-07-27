@extends('admin.master')
@section('title')
    Property
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
                    <form class="form-horizontal" action="{{route('store.property')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Property Title</label>
                            <input type="text" class="form-control" rows="5" name="property_title" id="property_title" placeholder="property Title">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" rows="5" name="location" id="location" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="number" class="form-control" rows="5" name="room_number" id="room_number" placeholder="Room Number">
                        </div>
                        <div class="form-group">
                            <label>Land area</label>
                            <input type="text" class="form-control" rows="5" name="land_area" id="land_area" placeholder="Land area">
                        </div>
                        <div class="form-group">
                            <label>Build year</label>
                            <input type="text" class="form-control" rows="5" name="build_year" id="build_year" placeholder="Build year">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" rows="5" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Property Details</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="property_details"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="property_home">
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
                        <th>Image</th>
                        <th>Title</th>
{{--                        <th>Details</th>--}}
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td><img src="{{ asset($property->image) }}" style="height: 100px"></td>
                            <td>{{ $property->property_title ?? null }}</td>
                            <td>
                                @if ($property->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($property->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.property',['id'=>$property->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
