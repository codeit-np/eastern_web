@extends('backend.templates.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-info btn-sm"><i class="fas fa-file-invoice-dollar"></i> ORDER DEAILS</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Delivery Address</th>
                                    <th>Total</th>
                                    <th>Delivered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th>{{ $invoice->id }}</th>
                                        <th>{{ $invoice->created_at->format('j-M-Y') }}</th>
                                        <td>{{ $invoice->user->name }}</td>
                                        <td>{{ $invoice->address }}</td>
                                        <td>{{ $invoice->total }}</td>
                                        <td>{{ $invoice->delivered == 0 ? 'No' : 'Yes' }}</td>
                                        <td>
                                            <a href="/invoice/{{ $invoice->id }}">Order Details</a>
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