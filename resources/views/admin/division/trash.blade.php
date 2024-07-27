@extends('admin.master')
@section('title')
    Division Trash List
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>SL/No</th>
                            <th>State Name</th>
                            <th>Division Name</th>
                            <th>Division Slug</th>
                            {{-- <th>Active/Deactive</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($divisions as $division)
                            <tr>
                                <th scope="row">{{ $divisions->firstItem()+$loop->index }}</th>
                                <td>{{ $division->state->state_name }}</td>
                                <td>{{ $division->division_name }}</td>
                                <td>{{ $division->division_slug }}</td>
                                {{-- <td>
                                    @if ($division->is_active == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-warning">Inactive</span>
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Setting
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('division.restore', ['division_slug' => $division->division_slug]) }}">Restore</a></li>
                                            <li>
                                                <form action="{{ route('division.forcedelete', ['division_slug' => $division->division_slug]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item show_confirm">Force Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
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
