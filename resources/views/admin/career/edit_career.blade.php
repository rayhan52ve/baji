@extends('admin.master')
@section('title')
    Career Edit
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
                    <form action="{{route('update.career')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$career->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Career Title</label>
                            <input type="text" class="form-control" rows="5" name="career_title" id="career_title" value="{{$career->career_title}}" placeholder="Career Title">
                        </div>
                        <div class="form-group">
                            <label>Field</label>
                            <input type="text" class="form-control" rows="5" name="field" id="field" value="{{$career->field}}" placeholder="Field">
                        </div>
                        <div class="form-group">
                            <label>Career Details</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="career_details">{!! $career->career_details !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="career_home">
                                <option value="1" @if ($career->career_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($career->career_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($career->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($career->status == 0) selected @endif>Deactive</option>
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
