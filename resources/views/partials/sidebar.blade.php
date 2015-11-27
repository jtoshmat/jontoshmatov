<?php
/*
 * To add or edit the list of sidebar tags/items/links
 * go to Repositories/SideBarItems.php
 */
?>

<div class="col-md-3">
	<img class="img-thumbnail" alt="350x350" src="http://placehold.it/350x350">
	<br /><br />
	<div class="list-group">

		<a class="list-group-item" href="/">Home</a>

		@if(!Auth::check())
			<a class="list-group-item" href="/auth/login">Login</a>
		@endif

		@foreach($tags as $title=>$link)
		<a class="list-group-item" href="{{ $link }}">{{ $title }}</a>
		@endforeach

		@if(Auth::check())
			<a class="list-group-item" href="/auth/logout">Logout</a>
		@endif

	</div>
</div>
