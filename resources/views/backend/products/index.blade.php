@extends('backend.templates.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products/create" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> CREATE NEW</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Faetured</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    
                                    <th>Discount</th>
                                    <th>Selling Price</th>
                                    <th>Units</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ $product->feature }}" width="30" alt=""></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                       
                                        <td>{{ $product->discount == '0' ? 'No' : 'Yes' }}</td>
                                        <td>{{ $product->sp }}</td>
                                        <td>{{ $product->unit->name }}</td>
                                        <td>
                                            <a href="/products/{{ $product->id }}/edit">Edit</a>
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