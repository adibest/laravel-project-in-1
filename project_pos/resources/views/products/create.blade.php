@extends('layouts.app')

@section('title', 'Create Items')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3>Create Item</h3>
				</div>
				<form method="post" action="{{ route('products.store') }}">

					@csrf

					<div class="panel-body">
						<label>Category</label>
						<select class="form-control" name="category_id">
							@foreach($cat as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="panel-body">
						<label>Price</label>
						<input type="text" name="price" class="form-control">
					</div>
					<div class="panel-body">
						<label>Status</label>
						<label class="fancy-radio">
							<input name="status" value="1" type="radio">
							<span><i></i>Ada</span>
						</label>
						<label class="fancy-radio">
							<input name="status" value="0" type="radio">
							<span><i></i>Habis</span>
						</label>
					</div>
					<div class="panel-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection