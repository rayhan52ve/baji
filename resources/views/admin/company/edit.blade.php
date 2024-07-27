@extends('admin.master')
@section('title')
    Company Edit
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
                    <form class="form-horizontal" action="{{ route('update.company') }}" method="POST">
                        @csrf
                        <h3>Company Update</h3>
                        <input type="hidden" value="{{$company_type->id}}" name="id">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="company_name" class="form-control" value="{{ $company_type->company_name }}">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                                @if ($company_type->is_active == 1)
                                checked
                            @endif>
                                <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                            </div> 
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
