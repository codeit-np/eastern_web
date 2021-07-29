@extends('backend.templates.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/units/create" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> CREATE NEW</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unit Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->id }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>
                                            <a href="/units/{{ $unit->id }}/edit">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection