@extends('admin.master')
@section('title')
    Member Procedure
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
                    <form class="form-horizontal" action="{{ route('store.memberprocedure') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Member Procedure Information</h3>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="banner_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="banner_description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Registered Image</label>
                            <input type="file" name="registered_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Registered Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="registered_description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Orientated Image</label>
                            <input type="file" name="orientated_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Orientated Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="orientated_description" ></textarea>
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
                        {{-- <th>List</th> --}}
                        <th>Title</th>
                        <th>Banner Image</th>
                        <th>Registered Image</th>
                        <th>Orientated Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($memberprocedures as $key => $memberprocedure)
                        <tr>
                            <td>{{ $memberprocedure->banner_title }}</td>
                            <td><img src="{{ asset($memberprocedure->banner_image) }}" style="height: 100px"></td>
                            <td><img src="{{ asset($memberprocedure->registered_image) }}" style="height: 100px"></td>
                            <td><img src="{{ asset($memberprocedure->orientated_image) }}" style="height: 100px"></td>
                            <td>
                                <a href="{{ route('edit.memberprocedure',['id'=>$memberprocedure->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
