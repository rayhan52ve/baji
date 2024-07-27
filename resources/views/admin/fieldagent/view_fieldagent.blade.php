@extends('admin.master')
@section('title')
    Field Agent View
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
                        <th colspan="2"><h2>Field Agent Information</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $fieldagent->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $fieldagent->first_name ?? null }} {{ $fieldagent->last_name ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $fieldagent->email ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $fieldagent->phone ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $fieldagent->street_address ?? null }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $fieldagent->city ?? null }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $fieldagent->state ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Postal code (Zip)</th>
                            <td>{{ $fieldagent->postal_code ?? null }}</td>
                        </tr>
                        {{-- <tr>
                            <th>Preferred Task Region</th>
                            <td>{{ $fieldagent->task_region ?? null }}</td>
                        </tr> --}}
                        <tr>
                            <th>Preferred Task Region</th>
                            <td>
                                @if ($fieldagent->task_region == 1)
                                    <p>Phoenix, AZ</p>
                                @elseif($fieldagent->task_region == 2)
                                    <p>Atlanta, GA</p>
                                @elseif($fieldagent->task_region == 3)
                                    <p>Chicago, IL</p>
                                @elseif($fieldagent->task_region == 4)
                                    <p>Baltimore, MD</p>
                                @elseif($fieldagent->task_region == 5)
                                    <p>Detroit, MI</p>
                                @elseif($fieldagent->task_region == 6)
                                    <p>Trenton, NJ</p>
                                @elseif($fieldagent->task_region == 7)
                                    <p>Las Vegas, NV</p>
                                @elseif($fieldagent->task_region == 8)
                                    <p>Central PA</p>
                                @elseif($fieldagent->task_region == 9)
                                    <p>Lehigh Valley, PA</p>
                                @elseif($fieldagent->task_region == 10)
                                    <p>Philadelphia, PA</p>
                                @elseif($fieldagent->task_region == 11)
                                    <p>Pittsburgh, PA</p>
                                @elseif($fieldagent->task_region == 12)
                                    <p>Reading, PA</p>
                                @elseif($fieldagent->task_region == 13)
                                    <p>Scranton, PA</p>
                                @elseif($fieldagent->task_region == 14)
                                    <p>Norfolk, VA</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Uber</th>
                            <td>
                                @if ($fieldagent->is_uber == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_uber == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lyft</th>
                            <td>
                                @if ($fieldagent->is_lyft == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_lyft == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>UberEats</th>
                            <td>
                                @if ($fieldagent->is_ubereats == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_ubereats == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>DoorDash</th>
                            <td>
                                @if ($fieldagent->is_doordash == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_doordash == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Handy</th>
                            <td>
                                @if ($fieldagent->is_handy == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_handy	 == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Instacart</th>
                            <td>
                                @if ($fieldagent->is_instacart == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_instacart == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Other</th>
                            <td>
                                @if ($fieldagent->is_other == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_other == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>N/A</th>
                            <td>
                                @if ($fieldagent->is_null == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($fieldagent->is_null == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Vendor W9</th>
                            <td><img src="{{ asset($fieldagent->image) }}" style="height: 100px"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($fieldagent->is_active == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($fieldagent->is_active == 0)
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
