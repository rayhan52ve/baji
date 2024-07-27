@extends('admin.master')
@section('title')
    FAQ Edit
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
                    <form action="{{route('update.faq')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$faq->id}}" name="id">
                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>FAQ Question</label>
                            <input type="text" class="form-control" name="faq_question" id="faq_question" value="{{ $faq->faq_question }}" placeholder="FAQ Question">
                        </div>
                        <div class="form-group">
                            <label>FAQ Answer</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="faq_answer">{{ $faq->faq_answer }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="faq_home">
                                <option value="1" @if ($faq->faq_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($faq->faq_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($faq->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($faq->status == 0) selected @endif>Deactive</option>
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
