@extends('dashboard.layout')

@section('link', 'Create Product')

@section('EditProduct')
@push('css')
<!-- Add any custom CSS here if needed -->
@endpush

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="{{ route('dashboard.updateProducts', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Left Column: Product Details -->
                <div class="col-md-8">
                    <!-- Product Details -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Product Details</h4>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name', $product->name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Pricing</h4>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ old('price', $product->price) }}">
                            </div>
                            <div class="mb-3">
                                <label for="media">Media</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="compare_price">Compare at Price</label>
                                <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ old('compare_price', $product->compare_price) }}">
                                <p class="text-muted mt-2">To show a reduced price, move the product’s original price into Compare at price.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Inventory</h4>
                            <div class="mb-3">
                                <label for="sku">SKU</label>
                                <input type="text" name="sku" id="sku" class="form-control" placeholder="SKU" value="{{ old('sku', $product->sku) }}" @disabled(true)>
                            </div>
                            <div class="mb-3">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ old('barcode', $product->barcode) }}" @disabled(true)>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="track_qty" name="track_qty" {{ old('track_qty', $product->track_qty) ? 'checked' : '' }}>
                                <label for="track_qty" class="form-check-label">Track Quantity</label>
                            </div>
                            <div class="mb-3">
                                <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Quantity" value="{{ old('qty', $product->qty) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Additional Info -->
                <div class="col-md-4">
                    <!-- Product Status -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Product Status</h4>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Block</option>
                            </select>
                        </div>
                    </div>

                    <!-- Category Selection -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Product Category</h4>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sub_category">Subcategory</label>
                                <select name="subcategory_id" id="sub_category" class="form-control">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Selection -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Product Brand</h4>
                            <select name="brand_id" id="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Featured Product -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Featured Product</h4>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="0" {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dashboard.products') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

@push('js')
<script src="{{ asset('js/dropzone.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
    new Dropzone("#image", { url: "/file/upload" });
</script>
@endpush

@endsection
