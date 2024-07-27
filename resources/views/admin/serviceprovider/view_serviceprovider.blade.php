@extends('admin.master')
@section('title')
    Service Provider View
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
                        <th colspan="2"><h2>Service Provider Information</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $serviceprovider->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $serviceprovider->first_name ?? null }} {{ $serviceprovider->last_name ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $serviceprovider->email ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $serviceprovider->phone ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $serviceprovider->street_address ?? null }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $serviceprovider->city ?? null }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $serviceprovider->state ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Base Region</th>
                            <td>{{ $serviceprovider->base_region ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Radius(In Mile)</th>
                            <td>{{ $serviceprovider->radius_in_mile ?? null }}</td>
                        </tr>
                        <tr>
                            <th>Air Duct Cleaning</th>
                            <td>
                                @if ($serviceprovider->is_airductcleaning == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_airductcleaning == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Appliance/ Repair</th>
                            <td>
                                @if ($serviceprovider->is_appliance == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_appliance == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Carpet Cleaner</th>
                            <td>
                                @if ($serviceprovider->is_carpetcleaner == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_carpetcleaner == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Cleaner</th>
                            <td>
                                @if ($serviceprovider->is_cleaner == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_cleaner == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Common Area Cleaning</th>
                            <td>
                                @if ($serviceprovider->is_commonareacleaning == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_commonareacleaning	 == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Damage Restoration</th>
                            <td>
                                @if ($serviceprovider->is_damage == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_damage == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Electrician</th>
                            <td>
                                @if ($serviceprovider->is_electrician == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_electrician == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Exterminator</th>
                            <td>
                                @if ($serviceprovider->is_exterminator == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_exterminator == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Fireplace Services</th>
                            <td>
                                @if ($serviceprovider->is_fireplaceservices == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_fireplaceservices == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Flooring</th>
                            <td>
                                @if ($serviceprovider->is_flooring == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_flooring == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Full Turnover</th>
                            <td>
                                @if ($serviceprovider->is_fullturnover == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_fullturnover == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Garage Door Installer/ Repair</th>
                            <td>
                                @if ($serviceprovider->is_garagedoor == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_garagedoor == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Gardener and Landscape Architect</th>
                            <td>
                                @if ($serviceprovider->is_gardener == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_gardener == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>General Contractor</th>
                            <td>
                                @if ($serviceprovider->is_generalcontractor == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_generalcontractor == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Glass and Mirrors</th>
                            <td>
                                @if ($serviceprovider->is_glassandmirrors == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_glassandmirrors == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Handyman</th>
                            <td>
                                @if ($serviceprovider->is_handyman == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_handyman == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Home Inspector</th>
                            <td>
                                @if ($serviceprovider->is_homeinspector == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_homeinspector == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>HVAC</th>
                            <td>
                                @if ($serviceprovider->is_hvac == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_hvac == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lawn Care</th>
                            <td>
                                @if ($serviceprovider->is_lawncare == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_lawncare == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lead Inspection</th>
                            <td>
                                @if ($serviceprovider->is_leadinspection == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_leadinspection == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lock Change</th>
                            <td>
                                @if ($serviceprovider->is_lockchange == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_lockchange == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Locksmith</th>
                            <td>
                                @if ($serviceprovider->is_locksmith == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_locksmith == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Mold Remediation</th>
                            <td>
                                @if ($serviceprovider->is_moldremediation == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_moldremediation == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No Heat</th>
                            <td>
                                @if ($serviceprovider->is_noheat == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_noheat == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Painter</th>
                            <td>
                                @if ($serviceprovider->is_painter == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_painter == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Plumber</th>
                            <td>
                                @if ($serviceprovider->is_plumber == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_plumber == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Plumber (Water Heater)</th>
                            <td>
                                @if ($serviceprovider->is_plumberwater == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_plumberwater == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pool Cleaning</th>
                            <td>
                                @if ($serviceprovider->is_poolcleaning == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_poolcleaning == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pool Maintenance</th>
                            <td>
                                @if ($serviceprovider->is_poolmaintenance == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_poolmaintenance == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pool/ Hot Tub Installer/ Repair</th>
                            <td>
                                @if ($serviceprovider->is_poolrepair == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_poolrepair == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Repairs</th>
                            <td>
                                @if ($serviceprovider->is_repair == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_repair == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Roofer</th>
                            <td>
                                @if ($serviceprovider->is_roofer == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_roofer == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Sec - 8 Inspector</th>
                            <td>
                                @if ($serviceprovider->is_secinspector == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_secinspector == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Sewage Back Up</th>
                            <td>
                                @if ($serviceprovider->is_sewagebackup == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_sewagebackup == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Sewage Cleanup</th>
                            <td>
                                @if ($serviceprovider->is_sewagecleanup == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_sewagecleanup == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Snow Removal</th>
                            <td>
                                @if ($serviceprovider->is_snowremoval == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_snowremoval == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tile Contractor</th>
                            <td>
                                @if ($serviceprovider->is_tilecontractor == 1)
                                    <button class="btn btn-sm btn-success">Yes</button>
                                @elseif($serviceprovider->is_tilecontractor == 0)
                                    <button class="btn btn-sm btn-danger">No</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Vendor W9</th>
                            <td><img src="{{ asset($serviceprovider->vendor_w9_image) }}" style="height: 100px"></td>
                        </tr>
                        <tr>
                            <th>Vendor COI (copy of liability insurance)</th>
                            <td><img src="{{ asset($serviceprovider->vendor_col_image) }}" style="height: 100px"></td>
                        </tr>
                        <tr>
                            <th>Vendor certification/ licences</th>
                            <td><img src="{{ asset($serviceprovider->vendor_certification_image) }}" style="height: 100px"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($serviceprovider->is_active == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($serviceprovider->is_active == 0)
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
