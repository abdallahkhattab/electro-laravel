@extends('dashboard.layout')

@section('editBrand')
    <!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Brand</h1>
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
					<form action="{{ route('dashboard.updateBrands',$brand->id) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name',$brand->name) }}" required>	
								</div>
							</div>
							
							<div class="mb-3">
							<label for="status">Status</label>
							<select class="form-control" id="status" name="status">
							<option value="1" {{ $brand->status==1?'selected' :'' }}>Active</option>
							<option value="0" {{ $brand->status==0?'selected' :'' }}>Blocked</option>
							</select>
						</div>
									  
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{ route('dashboard.brands') }}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</form>
					<!-- Form ends here -->
				</div>							
			</div>
		</div>
		<!-- /.card -->
	</section>
	
@endsection
