@extends('admin.master')
@section('title')
    Member Procedure Edit
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
                    <form class="form-horizontal" action="{{ route('update.memberprocedure') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$memberprocedure->id}}" name="id">
                        <h3>Member Procedure Update</h3>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="banner_title" class="form-control" value="{{ $memberprocedure->banner_title }}">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div>
                            <img src="{{ asset($memberprocedure->banner_image) }}" style="height: 100px">
                        </div>
                        <div class="form-group">
                            <label>Banner Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="banner_description" >{!! $memberprocedure->banner_description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Registered Image</label>
                            <input type="file" name="registered_image" class="form-control">
                        </div>
                        <div>
                            <img src="{{ asset($memberprocedure->registered_image) }}" style="height: 100px">
                        </div>
                        <div class="form-group">
                            <label>Registered Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="registered_description" >{!! $memberprocedure->registered_description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Orientated Image</label>
                            <input type="file" name="orientated_image" class="form-control">
                        </div>
                        <div>
                            <img src="{{ asset($memberprocedure->orientated_image) }}" style="height: 100px">
                        </div>
                        <div class="form-group">
                            <label>Orientated Description</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="orientated_description" >{!! $memberprocedure->orientated_description !!}</textarea>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
