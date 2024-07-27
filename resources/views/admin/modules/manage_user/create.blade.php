@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-6 col-md-8 col-lg-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            ADD NEW Member
                        </h4>
                        <form class="form-horizontal p-t-20" action="{{ route('superadmin.manage-user.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-6 col-md-12 col-lg-12 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Username </label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="uname1" name="name"
                                                placeholder="Admin/Agent Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-12 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Member Type</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <select type="select" class="form-control" id="uname1" name="is_admin"
                                                placeholder="Member Type" required>
                                                <option selected disabled>Select User Type</option>
                                                <option value="2">Admin 1</option>
                                                <option value="4">Admin 2</option>
                                                <option value="3">Agent</option>
                                                {{-- <option value="0">Customer</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-12 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Phone</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="phone" placeholder="Phone"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-12 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Password</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group row m-b-0">
                                <div class="col-sm-12 mt-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                        @if (session()->get('language') == 'bangla')
                                            তৈরি করুন
                                        @else
                                            Create
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #image-preview {
            border: 2px solid #ccc;
            /* Border color */
            padding: 5px;
            /* Padding around the image */
            margin-top: 10px;
            /* Margin from the top */
            display: block;
            width: 250px;
            min-height: 200px;
            box-sizing: border-box;
            /* Include border and padding in the total width/height */
        }
    </style>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection
