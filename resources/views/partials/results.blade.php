@extends('master')
@section('content')
	<div class="panel panel-info">
		<div class="panel-body" style="padding-top:30px">
			<h2>Search Results</h2>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr class="tr_head">

					<th>Name</th>
				</tr>
				</thead>


				<tbody>
				@foreach($friends as $friend)


					{{--*/  $isFriend = false /*--}}
					@if($friend->friends->contains(Auth::user()->id))
						{{--*/  $isFriend = true /*--}}
					@endif

					{{--*/  $fr_arryay = [] /*--}}
					{{--*/  $isFriendRequested = false /*--}}
					@foreach($friend->friendrequests as $fr)
						{{--*/  $fr_arryay[] = $fr->id /*--}}
					@endforeach
					{{--*/  $isFriendRequested = in_array(Auth::user()->id,$fr_arryay) /*--}}


					<tr>
						<td>
							<img src="http://placehold.it/50x50" alt="50x50" class="img-thumbnail">
							<a href="/admin/profile/{{ $friend->id }}/view"><h4>ID: {{ $friend->id }} {{$friend->name}}</h4></a>
							@if($friend->id!=Auth::user()->id)
								@if(!$isFriend)
									@if($isFriendRequested)
										Friend request sent |
									@else
										<a href="/admin/users/friendship/{{ $friend->id }}/add">Add Friend</a> |
									@endif
								@endif
									<a href="/admin/users/friendship/{{ $friend->id }}/delete">Delete Friend</a>  |
									<a href="/admin/users/friendship/{{ $friend->id }}/block">Block Friend</a>  |
									<a href="/admin/users/friendship/{{ $friend->id }}/message">Send Message</a>   |
									<a href="/admin/users/friendship/{{ $friend->id }}/poke">Poke</a>
							@else
								Your Profile
							@endif
							<hr />
							All Friends ({{count($friend->friends)}})
							<ul>
								@foreach($friend->friends as $friends)
									<li>{{$friends->name}}</li>
								@endforeach
							</ul>
							<hr />
							Mutual Friends (0)
							<ul>
								<li>Coming soon.</li>
							</ul>

						</td>




					</tr>
				@endforeach
				</tbody>
			</table>


		</div>
	</div>
@stop
