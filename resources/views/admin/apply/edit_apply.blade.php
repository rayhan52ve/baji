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
                <div class="card-header">
                    <h1 class="text-info">Apply For This Job</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update.apply') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$apply->id}}" name="id">
                        <h3>Front page information</h3>
                        <div class="form-group mb-3">
                            <label for="career_title" class="form-label">State Name</label>
                            <select name="career_id" id="" class="form-select">
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}" @if ($career->id == $apply->career_id)
                                        selected
                                    @endif>{{ $career->career_title }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="" value="{{ $apply->name }}" placeholder="Name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" rows="5" name="email" id="email" value="{{ $apply->email }}" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" rows="5" name="phone" id="phone" value="{{ $apply->phone }}" placeholder="Phone">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Address</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="address">{{ $apply->address }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Resume</label>
                            <input type="file" name="resume" class="form-control">
                        </div>
                        <img src="{{asset($apply->resume)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group mb-3">
                            <label class="form-label">Date Available</label>
                            <input type="date" class="form-control" rows="5" name="date_available" id="date_available" value="{{ $apply->date_available }}" placeholder="">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Expected Salary</label>
                            <input type="text" class="form-control" rows="5" name="expected_salary" id="expected_salary" value="{{ $apply->expected_salary }}" placeholder="Expected Salary">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Portfolio Link</label>
                            <input type="text" class="form-control" rows="5" name="portfolio_url" id="portfolio_url" value="{{ $apply->portfolio_url }}" placeholder="Portfolio Link">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">LinkedIn Profile</label>
                            <input type="text" class="form-control" rows="5" name="linkedin_url" id="linkedin_url" value="{{ $apply->linkedin_url }}" placeholder="LinkedIn Profile">
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="apply_home">
                                <option value="1" @if ($apply->apply_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($apply->apply_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($apply->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($apply->status == 0) selected @endif>Deactive</option>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
