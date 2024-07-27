@extends('admin.master')
@section('title')
    State Trashed List
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
                            <th>State Slug</th>
                            {{-- <th>Active/Deactive</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <th scope="row">{{ $states->firstItem()+$loop->index }}</th>
                                <td>{{ $state->state_name }}</td>
                                <td>{{ $state->state_slug }}</td>
                                {{-- <td>
                                    @if ($state->is_active == 1)
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
                                            <li><a class="dropdown-item" href="{{ route('state.restore', ['state_slug' => $state->state_slug]) }}">Restore</a></li>
                                            <li>
                                                <form action="{{ route('state.forcedelete', ['state_slug' => $state->state_slug]) }}" method="post">
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
