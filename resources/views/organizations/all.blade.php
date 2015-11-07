@extends('master')
@section('content')
	
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			<div class="header">Organizations</div>
			

			<span class="breadcrumb">
				<a href="/districts">Districts</a> | Organizations

			</span><hr />

			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr class="tr_head">
					<th>Title</th>
					<th>Users</th>
					<th>Created</th>
					<th>Last updated</th>
					<th>View</th>

				</tr>
				</thead>

				<tfoot>
				<tr>
					<th>Title</th>
					<th>Users</th>
					<th>Created</th>
					<th>Last updated</th>
					<th>View</th>

				</tr>
				</tfoot>

				<tbody>
				@foreach($data as $viewdata)
					<tr>
						<td>


							<a href="/organization/{{$viewdata->id}}/view">{{$viewdata->title}}</a>

						</td>
						<td>
							List of Users (teachers, students, guardian..)
						</td>
						<td>{{$viewdata->created_at}}</td>
						<td>{{$viewdata->updated_at}}
							{!! Form::hidden('id[]', $viewdata->id) !!}
						</td>
						<td>
							<a class="btn btn-primary" href="/organization/{{$viewdata->id}}/view">View</a>
						</td>

					</tr>
				@endforeach

				</tbody>
			</table>


			{!! Form::close() !!}
			<div class="pagination"><?php echo $data->render(); ?></div>

		</div>
	</div>
@stop
