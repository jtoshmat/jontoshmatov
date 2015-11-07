@extends('master')
@section('content')
	<style type="text/css">
		.tr_head{
			background: #5bc0de!important;
		}
	</style>
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			<span class="breadcrumb">
				<a href="/districts">District</a> |
				<a href="/organizations">Organizations</a> |
				<a href="/groups">Groups</a> |


			</span><hr />
			

			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<tr class="tr_head"><td><h2>{{$data->name}}</h2></td></tr>
				@if(count($data->guardians)>0)
				<tr><td><h3>Guardians ({{count($data->guardians)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
				<tr><td>

						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tr class="tr_head2">
								<td>Guardians Names</td>
								<td>Usernames</td>
							</tr>

							@foreach($data->guardians as $guardian)
								<tr>
									<td><a href="/user/{{$guardian->id}}/view">{{$guardian->name}}</a> </td>
									<td>{{$guardian->slug}}</td>
								</tr>
							@endforeach
						</table>

					</td></tr>
				@endif

				@if(count($data->children)>0)
				<tr><td><h3>Children ({{count($data->children)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
				<tr><td>

						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tr class="tr_head2">
								<td>Children Names</td>
								<td>Usernames</td>
							</tr>

							@foreach($data->children as $children)
								<tr>
									<td><a href="/user/{{$children->id}}/view">{{$children->name}}</a> </td>
									<td>{{$children->slug}}</td>
								</tr>
							@endforeach
						</table>

					</td></tr>
				@endif

				@if(count($data->role)>0)
				<tr><td><h3>Roles({{count($data->role)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
				<tr><td>

						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tr class="tr_head2">
								<td>Role</td>
								<td>Description</td>
							</tr>
							@foreach($data->role as $role)
							<tr>
								<td>{{$role->title}}</td>
								<td>{{$role->description}}</td>
							</tr>
							@endforeach
						</table>

					</td></tr>
					@endif


				@if(count($data->districts)>0)
					<tr><td><h3>districts({{count($data->districts)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
					<tr><td>

							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<tr class="tr_head2">
									<td>Title</td>
									<td>Description</td>
									<td>Role</td>
								</tr>
								@foreach($data->districts as $district)
									<tr>
										<td>{{$district->title}}</td>
										<td>{{$district->description}}</td>
										<td>{{$district->role()}}</td>
									</tr>
								@endforeach
							</table>

						</td></tr>
				@endif

				@if(count($data->organizations)>0)
					<tr><td><h3>Organizations({{count($data->organizations)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
					<tr><td>

							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<tr class="tr_head2">
									<td>Role</td>
									<td>Description</td>
								</tr>
								@foreach($data->organizations as $organization)
									<tr>
										<td>{{$organization->title}}</td>
										<td>{{$organization->description}}</td>
									</tr>
								@endforeach
							</table>

						</td></tr>
				@endif

					@if(count($data->groups)>0)
					<tr><td><h3>Groups({{count($data->groups)}}):<a title="Add new" class="btn btn-success btn_add_new" href="#">+</a></h3><hr /></td></tr>
					<tr><td>

							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<tr class="tr_head2">
									<td>Role</td>
									<td>Description</td>
								</tr>
								@foreach($data->groups as $group)
									<tr>
										<td>{{$group->title}}</td>
										<td>{{$group->description}}</td>
									</tr>
								@endforeach
							</table>

						</td></tr>
					@endif

			</table>

		</div>
	</div>
@stop