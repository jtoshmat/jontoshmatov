@extends('master')
@section('content')

	<div class="panel panel-info">



		<div class="panel-body" style="padding-top:30px">
			<span class="breadcrumb">
				<a href="/districts">District</a> |
				<a href="/organization/{{$data->organization_id}}/view">Organization</a> |
				<a href="/groups">Groups</a> |
				{{$data->title}}

			</span><hr />
			

			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<tr class="tr_head"><td><h2>{{$data->title}}</h2></td></tr>
				<tr><td><strong>Description:</strong> {{$data->description}}</td></tr>
				<tr><td><strong>Created:</strong> {{$data->created_at}}</td></tr>
				<tr><td><strong>Updated:</strong> {{$data->updated_at}}</td></tr>

				@if(count($data->teachers)>0)
				<tr><td><h3>Teachers:<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
				<tr><td>

						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tr class="tr_head2">
								<td>Teachers Names</td>
								<td>Usernames</td>
							</tr>

							@foreach($data->teachers as $user)
								<tr>
									<td><a href="/user/{{$user->id}}/view">{{$user->name}}</a> </td>
									<td>{{$user->slug}}</td>
								</tr>
							@endforeach
						</table>

					</td></tr>
				@endif

				@if(count($data->students)>0)
				<tr><td><h3>Students:<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
				<tr><td>

						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tr class="tr_head2">
								<td>Students Names</td>
								<td>Usernames</td>
							</tr>

							@foreach($data->students as $student)
								<tr>
									<td><a href="/user/{{$student->id}}/view">{{$student->name}}</a> </td>
									<td>{{$student->slug}}</td>
								</tr>
							@endforeach
						</table>

					</td></tr>
				@endif



			</table>

		</div>
	</div>
@stop
