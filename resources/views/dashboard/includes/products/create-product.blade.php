@extends('dashboard.layout')

@section('link', 'Create Product')

@section('createProduct')
@push('css')
<!-- Add any custom CSS here if needed -->
@endpush

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
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
        <form action="{{ route('dashboard.storeProducts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Left Column: Product Details -->
                <div class="col-md-8">
                    <!-- Product Details -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Product Details</h4>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>

             

                    <!-- Pricing -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Pricing</h4>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                            </div>

                            <div class="mb-3">
                                <label for="media">media</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="compare_price">Compare at Price</label>
                                <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                <p class="text-muted mt-2">To show a reduced price, move the product’s original price into Compare at price.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Inventory</h4>
                            <div class="mb-3">
                                <label for="sku" >SKU</label>
                                <input type="text" name="sku" id="sku" class="form-control" placeholder="SKU"  @readonly(true)>
                            </div>
                            <div class="mb-3">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" @disabled(true)>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                <label for="track_qty" class="form-check-label">Track Quantity</label>
                            </div>
                            <div class="mb-3">
                                <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Quantity">
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
                                <option value="1">Active</option>
                                <option value="0">Block</option>
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
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sub_category">Subcategory</label>
                                <select name="subcategory_id" id="sub_category" class="form-control">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Featured Product -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Featured Product</h4>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
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
