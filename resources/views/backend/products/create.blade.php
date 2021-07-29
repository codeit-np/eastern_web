@extends('backend.templates.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/products" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sku">SKU <span class="text-danger">*</span></label>
                                        <input id="sku" class="form-control" type="text" name="sku">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input id="name" class="form-control" type="text" name="name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input id="price" class="form-control" type="text" name="price">
                            </div>

                            <div class="form-group">
                                <label for="discount">Is there any discount in this product? <span class="text-danger">*</span></label>
                                <select id="discount" class="form-control" name="discount">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sp">Selling Price <span class="text-danger">*</span></label>
                                        <input id="sp" class="form-control" type="text" name="sp">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="unit_id">Unit <span class="text-danger">*</span></label>
                                        <select id="unit_id" class="form-control" name="unit_id">
                                           @foreach ($units as $unit)
                                               <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                 </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="feature">Feature <span class="text-danger">*</span></label>
                                <input id="feature" class="form-control-file" type="file" name="feature">
                            </div>

                            {{-- <div class="form-group">
                                <label for="images">Product Images</label>
                                <input id="images" class="form-control-file" type="file" name="images[]" multiple>
                            </div> --}}

                            <div class="form-group">
                                <label for="description">Short Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                <select id="category_id" class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Save Record</button>
                        </form>

                        @if (session('message'))
                            <div class="my-2 alert alert-success alert-sm">{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection