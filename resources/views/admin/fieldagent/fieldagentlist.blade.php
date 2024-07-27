@extends('admin.master')
@section('title')
    Field Agent
@endsection
@section('body')
    <div class="row mt-2">

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Field Agent List</h2>
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
                    @foreach ($fieldagents as $fieldagent)
                        <tr>
                            <td><img src="{{ asset($fieldagent->image) }}" style="height: 100px"></td>
                            <td>{{ $fieldagent->first_name ?? null }} {{ $fieldagent->last_name ?? null }}</td>
                            <td>{{ $fieldagent->email ?? null }}</td>
                            <td>{{ $fieldagent->phone ?? null }}</td>
                            <td>{{ $fieldagent->company_name ?? null }}</td>
                            <td>
                                @if ($fieldagent->is_active == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($fieldagent->is_active == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('view.fieldagent',['id'=>$fieldagent->id]) }}" class="btn btn-primary btn-sm editProduct">View</a>
                                <a href="{{ route('edit.fieldagent',['id'=>$fieldagent->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
