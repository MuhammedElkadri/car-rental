<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="car-details">
				<div class="img rounded"
					style="background-image: url('{{ $mainImage->getUrl() }}');">
				</div>

				<div class="text text-center">
					<span class="subheading">Cheverolet</span>
					<h2>Mercedes Grand Sedan</h2>
				</div>
			</div>
		</div>
	</div>
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				@foreach ($car->getMedia('car_images') as $image)
					@include('car_rent.partials.car-image')
				@endforeach
	
			</div>
		</div>

	</section>
	<div class="row">
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-dashboard"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Mileage
								<span>{{ $car->mileage }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-pistons"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Transmission
								<span>{{ $car->transmission }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-car-seat"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Seats
								<span>{{ $car->seats }} Adults</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-backpack"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Luggage
								<span>{{ $car->luggage }} Bags</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-diesel"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Fuel
								<span>{{ $car->fuel }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="{{ route('cars.book', ['car' => $car->id]) }}" class="btn btn-primary btn-floating" style="position: fixed; bottom: 30px; right: 30px; border-radius: 50%; padding: 15px; font-size: 24px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: background-color 0.3s;">
		<i class="flaticon-car" style="color: white;"></i> حجز
	</a>