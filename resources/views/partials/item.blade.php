	<a href="/item/{{ $item->id }}">
		<div class="col-md-4">
			<div class="panel panel-defualt">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h3>{{ $item->name }}</h3><br>
							{{-- <p>{{ $item->description }}</p><br> --}}
							<p><b>Price: </b></p>
							<p>£{{$item->price}}</p>

							@if(auth()->user()->type == 'staff')
							<p><b>Item Type:</b> </p>
							<p>{{ $item->type }}</p><br>
							@else
							<p><b>Allergies</b></p>
							<p>{{$item->allergies}}</p><br>
							@endif
						</div>
						<div class="col-md-6">
							<img class="img-rounded" src="{{ Storage::url($item->img) }}" style="width: 100%; height: auto; padding-top: 50%;">
						</div>
					</a>
						<div class="row"></div>
							<div class="col-md-12">
						<a href="/cart/additem/{{$item->id}}"><button class="btn-success btn center col-md-12">Quick Add</button></a>
					</div>
					</div>
				</div>
			</div>
		</div>
