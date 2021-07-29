@extends('backend.templates.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       
                        <a href="/units" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/units" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Unit name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Unit name">
                            </div>

                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Save Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection