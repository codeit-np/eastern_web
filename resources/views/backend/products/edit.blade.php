@extends('backend.templates.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products" class="btn btn-primary btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input id="sku" class="form-control" type="text" name="sku" value="{{ $product->SKU }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="text" name="price" value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label for="discount">Is there any discount in this product? <span class="text-danger">*</span></label>
                                <select id="discount" class="form-control" name="discount">
                                    <option value="0" {{ $product->discount == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->discount == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sp">Selling Price <span class="text-danger">*</span></label>
                                        <input id="sp" class="form-control" type="text" name="sp" value="{{ $product->sp }}">
                                    </div>
                                </div>
                                <div class="col">
                                   <div class="form-group">
                                       <label for="unit_id">Unit <span class="text-danger">*</span></label>
                                       <select id="unit_id" class="form-control" name="unit_id">
                                          @foreach ($units as $unit)
                                              <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                          @endforeach
                                       </select>
                                   </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="feature">Feature <span class="text-danger">*</span></label>
                                <input id="feature" class="form-control-file" type="file" name="feature" >
                            </div>
                            <img src="{{ asset($product->feature ) }}" width="60" alt="">

                            {{-- <div class="form-group">
                                <label for="images">Product Images <span class="text-danger">*</span></label>
                                <input id="images" class="form-control-file" type="file" name="images[]" multiple>
                            </div> --}}

                            @foreach ($product->images as $image)
                                <img src="{{ asset($image->name ) }}" width="50" alt="">
                            @endforeach

                            <div class="form-group">
                                <label for="description">Short Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                <select id="category_id" class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                         

                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-sync"></i> Update Record</button>
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