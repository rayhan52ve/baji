@extends('admin.master')
@section('title')
    Affiliate Edit
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
                    Update Affiliate
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('update.affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$affiliate->id}}" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" rows="5" name="first_name" id="first_name" value="{{ $affiliate->first_name }}" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" rows="5" name="last_name" id="last_name" value="{{ $affiliate->last_name }}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" rows="5" name="email" id="email" value="{{ $affiliate->email }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" rows="5" name="phone" id="phone" value="{{ $affiliate->phone }}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">I am a,</label>
                                    <select name="agent_type" id="" class="form-select">
                                        <option selected>Please Select</option>
                                        <option value="1" @if ($affiliate->agent_type == 1) selected @endif>Affiliate agent</option>
                                        <option value="2" @if ($affiliate->agent_type == 2) selected @endif>Vendor</option>
                                        <option value="3" @if ($affiliate->agent_type == 3) selected @endif>Property manager</option>
                                        <option value="4" @if ($affiliate->agent_type == 4) selected @endif>Existing Home365 owner</option>
                                        <option value="5" @if ($affiliate->agent_type == 5) selected @endif>Existing Home365 resident</option>
                                        <option value="6" @if ($affiliate->agent_type == 6) selected @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">How did you hear about us?</label>
                                    <select name="hear_about" id="" class="form-select">
                                        <option selected>Please Select</option>
                                        <option value="1" @if ($affiliate->hear_about == 1) selected @endif>Social media</option>
                                        <option value="2" @if ($affiliate->hear_about == 2) selected @endif>Marketing email</option>
                                        <option value="3" @if ($affiliate->hear_about == 3) selected @endif>Existing client</option>
                                        <option value="4" @if ($affiliate->hear_about == 4) selected @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add to Homepage</label>
                                    <select class="form-control" name="affiliate_home">
                                        <option value="1" @if ($affiliate->affiliate_home == 1) selected @endif>Yes</option>
                                        <option value="0" @if ($affiliate->affiliate_home == 0) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                                    @if ($affiliate->is_active == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                                </div>
                            </div>
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
