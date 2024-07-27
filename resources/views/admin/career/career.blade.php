@extends('admin.master')
@section('title')
    Career
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
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('store.career')}}" method="POST">
                        @csrf

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Career Title</label>
                            <input type="text" class="form-control" rows="5" name="career_title" id="career_title" placeholder="Career Title">
                        </div>
                        <div class="form-group">
                            <label>Field</label>
                            <input type="text" class="form-control" rows="5" name="field" id="field" placeholder="Field">
                        </div>
                        <div class="form-group">
                            <label>Career Details</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="career_details"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="property_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        {{-- <th>SL/No</th> --}}
                        <th>Title</th>
                        <th>Field</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($careers as $career)
                        <tr>
                            {{-- <th scope="row">{{ $careers->firstItem()+$loop->index }}</th> --}}
                            <td>{{ $career->career_title ?? null }}</td>
                            <td>{{ $career->field ?? null }}</td>
                            <td>
                                @if ($career->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($career->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.career',['id'=>$career->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
