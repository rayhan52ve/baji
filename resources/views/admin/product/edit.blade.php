@extends('admin.master')
@section('title')
    Product Edit
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
                    <form class="form-horizontal" action="{{ route('update.product') }}" method="POST">
                        @csrf
                        <h3>Product Update</h3>
                        <input type="hidden" value="{{$product_type->id}}" name="id">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $product_type->product_name }}">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                                @if ($product_type->is_active == 1)
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
