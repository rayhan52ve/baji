@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-6 col-md-8 col-lg-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            ADD NEW LEVEL
                        </h4>
                        <form class="form-horizontal p-t-20" action="{{ route('superadmin.baji-challenge.store') }}"
                            method="POST">
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
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Level</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="level"
                                                placeholder="Add new Level" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Reward</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="reward"
                                                placeholder="Add Reward for this level" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mt-2">
                                    <label for="uname1" class="col-sm-12 control-label mb-2">Requirement</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="uname1" name="requirement"
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

    <div class="container-fluid mt-5">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive m-t-20">
                    <h3 class="text-center ">
                        Baji Challenge levels
                    </h3>
                    <table id="config-table" class="table display table-striped border no-wrap text-center ">
                        <thead>
                            <tr>
                                <th>
                                    Level
                                </th>
                                <th>
                                    Reward
                                </th>
                                <th>
                                    Requarement
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $key => $item)
                                <tr>
                                    <td>
                                        {{ $item->level ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->reward ?? null }} ৳
                                    </td>
                                    <td>
                                        {{ $item->requirement ?? null }} ৳
                                    </td>
                                    <td><a href="{{ route('superadmin.baji-challenge.edit', $item->id) }}" title="Edit"
                                            class="btn btn-success"><i class="icon-note"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
