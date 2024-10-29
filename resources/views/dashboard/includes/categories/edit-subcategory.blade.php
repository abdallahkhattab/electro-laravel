@extends('dashboard.layout')

@section('editSubCategory')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Sub Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('dashboard.subcategory.update',$subCategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">	
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category_id" id="category" class="form-control" required>
                                    <option value="">Select a category</option>

                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>                                                           
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Sub Category Name" required value="{{ old('name',$subCategory->name) }}">	
                            </div>
                            
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                <option value="1" {{ $subCategory->status == 1?"selected" : "" }} >Active</option>
                                <option value="0" {{ $subCategory->status == 0 ?"selected" : ""}} >Blocked</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
