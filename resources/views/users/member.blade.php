@extends('master')
@section('content')
	<style type="text/css">
		.tr_head{
			background: #5bc0de !important;
			font-weight: 600;
		}
	</style>
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			<h2>Users -> Roles</h2>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<tr>
			        <td class="tr_head">Name: </td>
			        <td class="tr_head">{{$member->name}}</td>
		        </tr>

				<tr>
			        <td>Email: </td>
			        <td>{{$member->email}}</td>
		        </tr>

				<tr>
			        <td>Roles: </td>
			        <td>
				        <ul>
				        @foreach($member->role as $role)
					        <li>{{$role->title}}</li>
				        @endforeach
				        </ul>
			        </td>
		        </tr>

				<tr>
					<td>Created: </td>
					<td>{{$member->created_at}}</td>
				</tr>

				<tr>
					<td>Last Updated: </td>
					<td>{{$member->updated_at}}</td>
				</tr>


			</table>

			<a class="btn btn-primary" href="{{ URL::to("users/member/$member->id/update") }}">Update</a>

		</div>
	</div>
@stop
