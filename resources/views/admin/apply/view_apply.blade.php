@extends('admin.master')
@section('title')
    Career View
@endsection
@section('body')
    <div class="row mt-2">

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table class="table table-striped border">
                    <thead>
                    <tr>
                        <th colspan="2"><h2>Applicant Information</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Resume</th>
                            <td><img src="{{ asset($apply->resume) }}" style="height: 100px"></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>{{ $apply->career->career_title ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $apply->name ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $apply->email ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $apply->phone ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $apply->address ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Date Available</th>
                            <td>{{ $apply->date_available ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Expected Salary</th>
                            <td>{{ $apply->expected_salary ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Portfolio URL</th>
                            <td>{{ $apply->portfolio_url ?? null }}</td>
                        </tr>
                        <tr>
                            <th>LinkedIn URL</th>
                            <td>{{ $apply->linkedin_url ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($apply->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($apply->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script> --}}
@endsection
