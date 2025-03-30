<!-- Start of Selection -->
<div class="col-md-4">
	<div class="car-wrap rounded ftco-animate">
		<div class="img rounded d-flex align-items-end" style="background-image: url('{{ $image->getUrl() }}');">
			@can('deleteImage', $car)
			<form action="{{ route('cars.images.destroy', ['car' => $car->id, 'image' => $image->id]) }}" method="POST" style="position: absolute; top: 10px; left: 10px;">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger" style="border: none; background: rgba(255, 0, 0, 0.7); color: white; border-radius: 50%; padding: 5px 10px;">
					X<i class="flaticon-trash"></i>
				</button>
				</form>
			@endcan
			@can('update', $car)
			<div style="position: absolute; top: 10px; right: 10px; text-align: center;">
				<form action="{{ route('cars.images.setMain', ['car' => $car->id, 'image' => $image->id]) }}" method="POST">
					@csrf
					<button type="submit" class="btn btn-primary" style="border: none; background: rgba(0, 123, 255, 0.7); color: white; border-radius: 50%; padding: 5px 10px;" onmouseover="this.nextElementSibling.style.display='block';" onmouseout="this.nextElementSibling.style.display='none';">
						★<i class="flaticon-star"></i>
					</button>
					<span style="display: none; position: absolute; top: 30px; left: -10px; background: rgba(0, 0, 0, 0.7); color: white; padding: 5px; border-radius: 5px;">تعيين كرئيسية</span>
				</form>
			</div>
			@endcan
		</div>
	</div>
</div>