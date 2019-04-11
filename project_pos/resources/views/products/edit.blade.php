@extends('layouts.app')

@section('title', 'Edit Items')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3>Edit Items</h3>
				</div>
				<form method="post" action="{{ route('products.update', $data->id) }}">

					@csrf
					@method('PUT')
					<div class="panel-body">
						<label>Category</label>
						<select class="form-control" name="category_id">
							@foreach($cat as $item)
							<option value="{{ $item->id }}" {{ ( $item->id == $data->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control" value="{{ $data->name }}">
					</div>
					<div class="panel-body">
						<label>Price</label>
						<input type="text" name="price" class="form-control" value="{{ $data->price }}">
					</div>
					<div class="panel-body">
						<label>Status</label>
						<label class="fancy-radio">
							<input name="status" value="1" type="radio" {{ $data->status == '1' ? 'checked' : '' }}>
							<span><i></i>Ada</span>
						</label>
						<label class="fancy-radio">
							<input name="status" value="0" type="radio" {{ $data->status == '0' ? 'checked' : '' }}>
							<span><i></i>Habis</span>
						</label>
					</div>
					<div class="panel-body">
						<button type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection