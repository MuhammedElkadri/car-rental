@extends('car_rent.layouts.frontend')
@include('car_rent.partials.hero')
@section('content')
<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th class="bg-primary heading">Per Hour Rate</th>
						        <th class="bg-dark heading">Per Day Rate</th>
						        <th class="bg-black heading">Leasing</th>
						      </tr>
						    </thead>
						    <tbody>
						    	@foreach ($cars as $car)
						
						    	@include('car_rent.partials.car.table-car')
						    	@endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>
	<div class="d-flex justify-content-center">
		{{ $cars->links('pagination::bootstrap-4') }}
	</div>
@endsection


