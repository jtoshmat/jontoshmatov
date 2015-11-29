<div class="friends col-md-3">
	<h5>Friends</h5>
	<ul>
		@foreach($friends as $friend)
		<li>{{$friend}}</li>
		@endforeach
	</ul>
	<h5>Pending friends</h5>
	<ul>
		@foreach($friends as $friend)
			<li>{{$friend}}</li>
		@endforeach
	</ul>
</div>