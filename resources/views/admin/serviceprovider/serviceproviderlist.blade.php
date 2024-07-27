@extends('admin.master')
@section('title')
    Service Provider
@endsection
@section('body')
    <div class="row mt-2">

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Service Provider List</h2>
            </div>
            <div class="card-body">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceproviders as $serviceprovider)
                            <tr>
                                <td><img src="{{ asset($serviceprovider->vendor_w9_image) }}" style="height: 100px"></td>
                                <td>{{ $serviceprovider->first_name ?? null }} {{ $serviceprovider->last_name ?? null }}</td>
                                <td>{{ $serviceprovider->email ?? null }}</td>
                                <td>{{ $serviceprovider->phone ?? null }}</td>
                                <td>{{ $serviceprovider->company_name ?? null }}</td>
                                <td>
                                    @if ($serviceprovider->is_active == 1)
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    @elseif($serviceprovider->is_active == 0)
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('view.serviceprovider',['id'=>$serviceprovider->id]) }}" class="btn btn-primary btn-sm editProduct">View</a>
                                    <a href="{{ route('edit.serviceprovider',['id'=>$serviceprovider->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
