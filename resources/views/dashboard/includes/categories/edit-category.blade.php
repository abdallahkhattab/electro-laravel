				
@extends('dashboard.layout')
@section('link','create Category')
@section('editCategory')				
<section class="content-header">					
	<div class="container-fluid my-2">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Category</h1>
			</div>
			<div class="col-sm-6 text-right">
				<a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<!-- Form starts here -->
				<form action="{{ route('dashboard.updateCategory',$category->id) }}" method="POST">
					@csrf  <!-- This is necessary for CSRF protection in Laravel -->
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Name" required value="{{ old('name',$category->name) }}">	
							</div>
						</div>
											<!-- Example Dropdown List UI -->
						<div class="mb-3">
						<label for="status">Status</label>
						<select class="form-control" id="status" name="status">
						<option value="1"  {{ $category->status==1?'selected' :'' }}>Active</option>
						<option value="0" {{ $category->status==0?'selected':'' }}>Blocked</option>
						</select>
					</div>
								  
					</div>
					<div class="pb-5 pt-3">
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="{{ route('dashboard.category') }}" class="btn btn-outline-dark ml-3">Cancel</a>
					</div>
				</form>
				<!-- Form ends here -->
			</div>							
		</div>
	</div>
	<!-- /.card -->
</section>

@endsection
	
