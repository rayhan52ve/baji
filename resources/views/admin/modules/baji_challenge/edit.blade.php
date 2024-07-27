@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-6 col-md-8 col-lg-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            Edit Baji Challenge
                        </h4>
                        <form class="form-horizontal p-t-20" action="{{ route('superadmin.baji-challenge.update',$bajiChallenge) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
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
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Level</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="level" value="{{ $bajiChallenge->level }}"
                                                placeholder="Add new Level" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Reward</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="reward"  value="{{ $bajiChallenge->reward }}"
                                                placeholder="Add Reward for this level" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Requirement</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="requirement"  value="{{ $bajiChallenge->requirement }}"
                                                placeholder="Add Requirement for Level" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-0">
                                <div class="col-sm-12 mt-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
