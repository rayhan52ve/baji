@extends('admin.master')
@section('title')
    Field Agent Edit
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
                    Update Field Agent
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('update.fieldagent') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$fieldagent->id}}" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" rows="5" name="first_name" id="first_name" value="{{ $fieldagent->first_name }}" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" rows="5" name="last_name" id="last_name" value="{{ $fieldagent->last_name }}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Company name (if applicable)</label>
                                    <input type="text" class="form-control" rows="5" name="company_name" id="company_name" value="{{ $fieldagent->company_name }}" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" rows="5" name="email" id="email" value="{{ $fieldagent->email }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" rows="5" name="phone" id="phone" value="{{ $fieldagent->phone }}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Street Address</label>
                                    <input type="text" class="form-control" rows="5" name="street_address" id="street_address" value="{{ $fieldagent->street_address }}" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" rows="5" name="city" id="city" value="{{ $fieldagent->city }}" placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" rows="5" name="state" id="state" value="{{ $fieldagent->state }}" placeholder="State">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Postal code (Zip)</label>
                                    <input type="text" class="form-control" rows="5" name="postal_code" id="postal_code" value="{{ $fieldagent->postal_code }}" placeholder="Postal code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Preferred Task Region</label>
                                    <select name="task_region" id="task_region" class="form-select">
                                        <option selected>Please Select</option>
                                        <option value="1" @if ($fieldagent->task_region == 1) selected @endif>Phoenix, AZ</option>
                                        <option value="2" @if ($fieldagent->task_region == 2) selected @endif>Atlanta, GA</option>
                                        <option value="3" @if ($fieldagent->task_region == 3) selected @endif>Chicago, IL</option>
                                        <option value="4" @if ($fieldagent->task_region == 4) selected @endif>Baltimore, MD</option>
                                        <option value="5" @if ($fieldagent->task_region == 5) selected @endif>Detroit, MI</option>
                                        <option value="6" @if ($fieldagent->task_region == 6) selected @endif>Trenton, NJ</option>
                                        <option value="7" @if ($fieldagent->task_region == 7) selected @endif>Las Vegas, NV</option>
                                        <option value="8" @if ($fieldagent->task_region == 8) selected @endif>Central PA</option>
                                        <option value="9" @if ($fieldagent->task_region == 9) selected @endif>Lehigh Valley, PA</option>
                                        <option value="10" @if ($fieldagent->task_region == 10) selected @endif>Philadelphia, PA</option>
                                        <option value="11" @if ($fieldagent->task_region == 11) selected @endif>Pittsburgh, PA</option>
                                        <option value="12" @if ($fieldagent->task_region == 12) selected @endif>Reading, PA</option>
                                        <option value="13" @if ($fieldagent->task_region == 13) selected @endif>Scranton, PA</option>
                                        <option value="14" @if ($fieldagent->task_region == 14) selected @endif>Norfolk, VA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Previously Worked Marketplaces (Select all that apply)</label>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_uber" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_uber == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Uber</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_lyft" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_lyft == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Lyft</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_ubereats" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_ubereats == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">UberEats</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_doordash" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_doordash == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">DoorDash</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_handy" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_handy == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Handy</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_instacart" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_instacart == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Instacart</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_other" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_other == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">Other</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_null" type="checkbox" role="switch" id="activeStatus" @if ($fieldagent->is_null == 1)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="activeStatus">N/A</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Photo ID</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <img src="{{asset($fieldagent->image)}}" class="mb-2" height="100" width="100" alt="">
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">I am a,</label>
                                    <select name="agent_type" id="" class="form-select">
                                        <option selected>Please Select</option>
                                        <option value="1" @if ($affiliate->agent_type == 1) selected @endif>Affiliate agent</option>
                                        <option value="2" @if ($affiliate->agent_type == 2) selected @endif>Vendor</option>
                                        <option value="3" @if ($affiliate->agent_type == 3) selected @endif>Property manager</option>
                                        <option value="4" @if ($affiliate->agent_type == 4) selected @endif>Existing Home365 owner</option>
                                        <option value="5" @if ($affiliate->agent_type == 5) selected @endif>Existing Home365 resident</option>
                                        <option value="6" @if ($affiliate->agent_type == 6) selected @endif>Other</option>
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">How did you hear about us?</label>
                                    <select name="hear_about" id="" class="form-select">
                                        <option selected>Please Select</option>
                                        <option value="1" @if ($affiliate->hear_about == 1) selected @endif>Social media</option>
                                        <option value="2" @if ($affiliate->hear_about == 2) selected @endif>Marketing email</option>
                                        <option value="3" @if ($affiliate->hear_about == 3) selected @endif>Existing client</option>
                                        <option value="4" @if ($affiliate->hear_about == 4) selected @endif>Other</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add to Homepage</label>
                                    <select class="form-control" name="fieldagent_home">
                                        <option value="1" @if ($fieldagent->fieldagent_home == 1) selected @endif>Yes</option>
                                        <option value="0" @if ($fieldagent->fieldagent_home == 0) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeStatus"
                                    @if ($fieldagent->is_active == 1)
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
