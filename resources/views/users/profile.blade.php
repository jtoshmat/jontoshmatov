@extends('master')
@section('content')
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			{{--*/  $isFriend = false /*--}}
		@if($user->friends->contains(Auth::user()->id))
			{{--*/  $isFriend = true /*--}}
		@endif

			{{--*/  $fr_arryay = [] /*--}}
			{{--*/  $isFriendRequested = false /*--}}
			@foreach($user->friendrequests as $fr)
				{{--*/  $fr_arryay[] = $fr->id /*--}}
			@endforeach
			{{--*/  $isFriendRequested = in_array(Auth::user()->id,$fr_arryay) /*--}}


			<img src="http://placehold.it/50x50" alt="50x50" class="img-thumbnail">
			<a href="#"><h4>ID: {{ $user->id }} {{$user->name}}</h4></a>

<table>
				<tbody>

					<tr>
						<td>
							@if($user->id!=Auth::user()->id)
								@if(!$isFriend)
									@if($isFriendRequested)
										Friend request sent |
									@else
										<a href="/admin/users/friendship/{{ $user->id }}/add">Add Friend</a> |
									@endif
								@endif

								<a href="/admin/users/friendship/{{ $user->id }}/delete">Delete Friend</a>  |
								<a href="/admin/users/friendship/{{ $user->id }}/block">Block Friend</a>  |
								<a href="/admin/users/friendship/{{ $user->id }}/message">Send Message</a>   |
								<a href="/admin/users/friendship/{{ $user->id }}/poke">Poke</a> </td>
						@endif
					</tr>

				</tbody>
</table>



			<p></p>
			<p>Name: {{$user->name}}</p>
			<p>First Name: {{$user->first_name}}</p>
			<p>Middle Name: {{$user->middle_name}}</p>
			<p>Last Name: {{$user->last_name}}</p>
			<p>Friends ({{count($user->acceptedfriends)}}):

			<ul>
				@foreach($user->acceptedfriends as $acceptedfriends)
					<li><a href="/admin/profile/{{ $acceptedfriends->id }}/view"> {{$acceptedfriends->name}}</a></li>
				@endforeach
			</ul>


			<p>Pending Friends ({{count($user->pendingfriends)}}):

			<ul>
				@foreach($user->pendingfriends as $pendingfriends)
					<li><a href="/admin/profile/{{ $pendingfriends->id }}/view"> {{$pendingfriends->name}}</a></li>
				@endforeach
			</ul>

		</div>
	</div>
@stop
