@extends('admin.master')
@section('title')
    Affiliate
@endsection
@section('body')
    <div class="row mt-2">

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Our Partners</h2>
            </div>
            <div class="card-body">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Agent Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Hear About</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($affiliates as $affiliate)
                        <tr>
                            <td>
                                @if ($affiliate->agent_type == 1)
                                    <p>Affiliate agent</p>
                                @elseif($affiliate->agent_type == 2)
                                    <p>Vendor</p>
                                @elseif($affiliate->agent_type == 3)
                                    <p>Property manager</p>
                                @elseif($affiliate->agent_type == 4)
                                    <p>Existing Home365 owner</p>
                                @elseif($affiliate->agent_type == 5)
                                    <p>Existing Home365 resident</p>
                                @elseif($affiliate->agent_type == 5)
                                    <p>Other</p>
                                @endif
                            </td>
                            <td>{{ $affiliate->first_name ?? null }} {{ $affiliate->last_name ?? null }}</td>
                            <td>{{ $affiliate->email ?? null }}</td>
                            <td>{{ $affiliate->phone ?? null }}</td>
                            <td>
                                @if ($affiliate->hear_about == 1)
                                    <p>Social media</p>
                                @elseif($affiliate->hear_about == 2)
                                    <p>Marketing email</p>
                                @elseif($affiliate->hear_about == 3)
                                    <p>Existing client</p>
                                @elseif($affiliate->hear_about == 4)
                                    <p>Other</p>
                                @endif
                            </td>
                            <td>
                                @if ($affiliate->is_active == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($affiliate->is_active == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('view.affiliate',['id'=>$affiliate->id]) }}" class="btn btn-primary btn-sm editProduct">View</a>
                                <a href="{{ route('edit.affiliate',['id'=>$affiliate->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
