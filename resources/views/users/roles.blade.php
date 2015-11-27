@extends('master')
@section('content')
	
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			<h2>Roles -> Permissions</h2>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr class="tr_head">

					<th>Title</th>
					<th>Created</th>
					<th>Last updated</th>
				</tr>
				</thead>

				<tfoot>
				<tr>
					<th>Title</th>
					<th>Created</th>
					<th>Last updated</th>
				</tr>
				</tfoot>

				<tbody>
				@foreach($roles as $role)
					<tr>
						<td><a href="#">{{$role->title}}</a></td>

						<td>{{$role->created_at}}</td>
						<td>{{$role->updated_at}}</td>

					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="pagination"><?php echo $roles->render(); ?></div>

		</div>
	</div>
@stop
