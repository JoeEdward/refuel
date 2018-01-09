	<a href="/item/{{ $item->id }}">
	<div class="col-md-4">
		<div class="panel panel-defualt">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6" style="height: 250px">
						<h3>{{ $item->name }}</h3><br>
						{{-- <p>{{ $item->description }}</p><br> --}}
						<p><b>Price: </b></p>
						<p>£{{$item->price}}</p>
						<p><b>Item Type:</b> </p>
						<p>{{ $item->type }}</p><br>
					</div>
					<div class="col-md-6">
						<img class="img-rounded" src="{{ Storage::url($item->img) }}" style="width: 100%; height: auto; padding-top: 50%;">
					</div>
				</div>
			</div>
		</div>
	</div>
</a>
