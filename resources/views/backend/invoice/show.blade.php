@extends('backend.templates.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <a href="/invoice">back</a>
                   </div>
                   <div class="card-body">
                    <strong>Invoice No: {{ $maininvoice->id }}</strong> <br>
                    <strong>Date: {{ $maininvoice->created_at->format('j-M-Y') }}</strong>
                    <hr>
                    <strong>Customer Name:</strong> {{ $maininvoice->user->name }} <br>
                    <strong>Delivery Address:</strong> {{ $maininvoice->user->address }} <br>
                    <strong>Mobile:</strong> {{ $maininvoice->user->mobile }} <br>
                    <hr>
                    <h5>Invoice Details</h5>

                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                        @foreach ($invoicedetails as $key => $invoice)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $invoice->product->name }}</td>
                                <td>{{ $invoice->qty}}</td>
                                <td>{{ $invoice->product->sp}}</td>
                                <td>{{ $invoice->amount}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th>{{ $maininvoice->total }}</th>
                        </tr>
                     </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection