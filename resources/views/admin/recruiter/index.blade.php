@extends('admin.master')
@section('title')
    Recruiter
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
                    <form class="form-horizontal" action="{{ route('store.recruiter') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Recruiter Information</h3>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Recruiter Image</label>
                            <input type="file" name="recruiter_photo" class="form-control">

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
                        <th>Banner Image</th>
                        <th>Recruiter Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($recruiters as $key => $recruiter)
                        <tr>
                            {{-- <td>{{ $key++ }}</td> --}}
                            <td><img src="{{ asset($recruiter->banner_image) }}" style="height: 100px"></td>
                            <td><img src="{{ asset($recruiter->recruiter_photo) }}" style="height: 100px"></td>
                            <td>{{ $recruiter->title ?? null }}</td>
                            <td>
                                <a href="{{ route('edit.recruiter',['id'=>$recruiter->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
