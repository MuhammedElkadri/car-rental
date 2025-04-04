<tr class="">

    <!-- car image -->
    <td class="car-image" onmouseover="this.querySelector('.overlay').style.display='block';"
        onmouseout="this.querySelector('.overlay').style.display='none';">
        <div class="img"
                style="background-image:url({{ $car->getMedia('car_images')->firstWhere('custom_properties.is_main', true)?->getUrl() ?? $car->getMedia('car_images')->first()?->getUrl() }}); position: relative;">
                <a href="{{ route('cars.show', ['car' => $car->id]) }}" class="overlay"
                    style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); color: white; text-align: center; line-height: 100px;">View
                    Details</a>
            </div>
    </td>
    <!-- end car image -->

    <!-- car name -->
    <td class="product-name">

        <h3>{{ $car->brand }}</h3>
        <h4>{{ $car->user->name }}</h4>
        <span class="status-label">{{ $car->status }}</span>
        <p class="mb-0 rated">
            <span>rated:</span>
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $car->reviews->avg('rating'))
                    <span class="ion-ios-star" style="color: gold;"></span>
                @else
                    <span class="ion-ios-star-outline" style="color: gray;"></span>
                @endif
            @endfor
        </p>
        @if (auth()->user()?->id == $car->user_id or auth()->user()?->hasRole('admin'))
            <form action="{{ route('cars.destroy', ['car' => $car->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه السيارة؟');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        @endif
        @if (auth()->user()?->id == $car->user_id)
            <form action="{{ route('cars.edit', ['car' => $car->id]) }}" method="GET" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-primary">تعديل</button>
            </form>
        @endif
        </p>
    </td>
    <!-- end car name -->

        <!-- car price -->

    <td class="price">
        <p class="btn-custom"><a href="{{ route('cars.book', ['car' => $car->id]) }}">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_hour }}</span>
                <span class="per">/per hour</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>

    <td class="price">
        <p class="btn-custom"><a href="{{ route('cars.book', ['car' => $car->id]) }}">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_day }}</span>
                <span class="per">/per day</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>
    <!-- end car price -->

    <!-- car price -->
    <td class="price">
        <p class="btn-custom"><a href="{{ route('cars.book', ['car' => $car->id]) }}">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_month }}</span>
                <span class="per">/per month</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>
    <!-- end car price -->
</tr>
<!-- END TR-->