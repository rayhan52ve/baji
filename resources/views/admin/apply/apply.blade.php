@extends('admin.master')
@section('title')
    Career
@endsection
@section('body')
    <div class="row mt-2">

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Resume</th>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Expected Salary</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($applies as $apply)
                        <tr>
                            <td><img src="{{ asset($apply->resume) }}" style="height: 100px"></td>
                            <td>{{ $apply->career->career_title ?? null }}</td>
                            <td>{{ $apply->name ?? null }}</td>
                            <td>{{ $apply->email ?? null }}</td>
                            <td>{{ $apply->phone ?? null }}</td>
                            <td>{{ $apply->expected_salary ?? null }}</td>
                            <td>
                                @if ($apply->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($apply->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('view.apply',['id'=>$apply->id]) }}" class="btn btn-primary btn-sm editProduct">View</a>
                                <a href="{{ route('edit.apply',['id'=>$apply->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
