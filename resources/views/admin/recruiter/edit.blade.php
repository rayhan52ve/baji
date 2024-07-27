@extends('admin.master')
@section('title')
    Recruiter Edit
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
                    <form class="form-horizontal" action="{{ route('update.recruiter') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$recruiter->id}}" name="id">
                        <h3>Update</h3>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $recruiter->title }}">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <img src="{{asset($recruiter->banner_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Recruiter Image</label>
                            <input type="file" name="recruiter_photo" class="form-control">
                        </div>
                        <img src="{{asset($recruiter->recruiter_photo)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
