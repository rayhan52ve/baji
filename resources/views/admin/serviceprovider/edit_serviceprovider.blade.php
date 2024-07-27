@extends('admin.master')
@section('title')
    Service Provider Edit
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
                <div class="card-header">
                    Update Service Provider
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('update.serviceprovider') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$serviceprovider->id}}" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Company name (if applicable)</label>
                                    <input type="text" class="form-control" rows="5" name="company_name" id="company_name" value="{{ $serviceprovider->company_name }}" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" rows="5" name="first_name" id="first_name" value="{{ $serviceprovider->first_name }}" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" rows="5" name="last_name" id="last_name" value="{{ $serviceprovider->last_name }}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" rows="5" name="phone" id="phone" value="{{ $serviceprovider->phone }}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" rows="5" name="email" id="email" value="{{ $serviceprovider->email }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Street Address</label>
                                    <input type="text" class="form-control" rows="5" name="street_address" id="street_address" value="{{ $serviceprovider->street_address }}" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" rows="5" name="city" id="city" value="{{ $serviceprovider->city }}" placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" rows="5" name="state" id="state" value="{{ $serviceprovider->state }}" placeholder="State">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Base Region</label>
                                    <select name="base_region" id="base_region" class="form-select">
                                        {{-- <option selected>Please Select</option> --}}
                                        <option value="1" @if ($serviceprovider->base_region == 1) selected @endif>Phoenix, AZ</option>
                                        <option value="2" @if ($serviceprovider->base_region == 2) selected @endif>Atlanta, GA</option>
                                        <option value="3" @if ($serviceprovider->base_region == 3) selected @endif>Chicago, IL</option>
                                        <option value="4" @if ($serviceprovider->base_region == 4) selected @endif>Baltimore, MD</option>
                                        <option value="5" @if ($serviceprovider->base_region == 5) selected @endif>Detroit, MI</option>
                                        <option value="6" @if ($serviceprovider->base_region == 6) selected @endif>Trenton, NJ</option>
                                        <option value="7" @if ($serviceprovider->base_region == 7) selected @endif>Las Vegas, NV</option>
                                        <option value="8" @if ($serviceprovider->base_region == 8) selected @endif>Central PA</option>
                                        <option value="9" @if ($serviceprovider->base_region == 9) selected @endif>Lehigh Valley, PA</option>
                                        <option value="10" @if ($serviceprovider->base_region == 10) selected @endif>Philadelphia, PA</option>
                                        <option value="11" @if ($serviceprovider->base_region == 11) selected @endif>Pittsburgh, PA</option>
                                        <option value="12" @if ($serviceprovider->base_region == 12) selected @endif>Reading, PA</option>
                                        <option value="13" @if ($serviceprovider->base_region == 13) selected @endif>Scranton, PA</option>
                                        <option value="14" @if ($serviceprovider->base_region == 14) selected @endif>Norfolk, VA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Radius in Miles</label>
                                    <input type="number" class="form-control" name="radius_in_mile" id="radius_in_mile" placeholder="State">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label><h6>Service Categories</h6></label>
                                <p>Please only select the categories that are relevant to you. </p>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_airductcleaning" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_airductcleaning == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Air Duct Cleaning</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_appliance" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_appliance == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Appliance/ Repair</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_carpetcleaner" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_carpetcleaner == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Carpet Cleaner</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_cleaner" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_cleaner == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Cleaner</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_commonareacleaning" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_commonareacleaning == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Common Area Cleaning</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_damage" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_damage == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Damage Restoration</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_electrician" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_electrician == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Electrician</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_exterminator" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_exterminator == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Exterminator</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_fireplaceservices" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_fireplaceservices == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Fireplace Services</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_flooring" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_flooring == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Flooring</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_fullturnover" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_fullturnover == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Full Turnover</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_garagedoor" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_garagedoor == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Garage Door Installer/ Repair</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_gardener" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_gardener == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Gardener and Landscape Architect</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_generalcontractor" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_generalcontractor == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">General Contractor</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_glassandmirrors" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_glassandmirrors == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Glass and Mirrors</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_handyman" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_handyman == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Handyman</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_homeinspector" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_homeinspector == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Home Inspector</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_hvac" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_hvac == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">HVAC</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_lawncare" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_lawncare == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Lawn Care</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_leadinspection" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_leadinspection == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Lead Inspection</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_lockchange" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_lockchange == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Lock Change</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_locksmith" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_locksmith == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Locksmith</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_moldremediation" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_moldremediation == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Mold Remediation</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_noheat" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_noheat == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">No Heat</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_painter" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_painter == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Painter</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_plumber" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_plumber == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Plumber</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_plumberwater" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_plumberwater == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Plumber (Water Heater)</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_poolcleaning" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_poolcleaning == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Pool Cleaning</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_poolmaintenance" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_poolmaintenance == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Pool Maintenance</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_poolrepair" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_poolrepair == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Pool/ Hot Tub Installer/ Repair</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_repair" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_repair == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Repairs</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_roofer" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_roofer == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Roofer</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_secinspector" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_secinspector == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Sec - 8 Inspector</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_sewagebackup" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_sewagebackup == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Sewage Back Up</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_sewagecleanup" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_sewagecleanup == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Sewage Cleanup</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_snowremoval" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_snowremoval == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Snow Removal</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_tilecontractor" type="checkbox" role="switch" id="activeStatus" @if ($serviceprovider->is_tilecontractor == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Tile Contractor</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Vendor W9</label>
                                    <input type="file" name="vendor_w9_image" class="form-control">
                                </div>
                                <img src="{{asset($serviceprovider->vendor_w9_image)}}" class="mb-2" height="100" width="100" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Vendor COI (copy of liability insurance)</label>
                                    <input type="file" name="vendor_col_image" class="form-control">
                                </div>
                                <img src="{{asset($serviceprovider->vendor_col_image)}}" class="mb-2" height="100" width="100" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Vendor certification/ licences</label>
                                    <input type="file" name="vendor_certification_image" class="form-control">
                                </div>
                                <img src="{{asset($serviceprovider->vendor_certification_image)}}" class="mb-2" height="100" width="100" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add to Homepage</label>
                                    <select class="form-control" name="serviceproviders_home">
                                        <option value="1" @if ($serviceprovider->serviceproviders_home == 1) selected @endif>Yes</option>
                                        <option value="0" @if ($serviceprovider->serviceproviders_home == 0) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                                    @if ($serviceprovider->is_active == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
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
