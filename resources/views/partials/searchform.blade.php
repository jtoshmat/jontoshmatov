<div>
	<?php
	$keyword = isset($_GET["keyword"])?$_GET["keyword"]:null;
	?>
	{!! Form::open(array('url' => '/search', 'class' => 'form-horizontal2', 'role' =>
			'form', 'id' =>'loginform','method' => 'get'))	!!}
	{!! Form::text('keyword', $keyword, array('class' => 'form-control2', 'placeholder' => 'Your keyword', 'id' =>
							'search-keyword', 'type' => 'text')) !!}
	In {!!  Form::select('searchtype', ['friend'=>'friends','posts'=>'posts','image'=>'images']) !!}
	{!! Form::submit('Search', array('class' => 'btn btn-success2', 'id' => 'btn-update')) !!}
	{!! Form::close() !!}
</div>