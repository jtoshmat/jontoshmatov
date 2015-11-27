@extends('master')
@section('content')
	
	<div class="panel panel-info">

		<div class="panel-body" style="padding-top:30px">
			<h2>Guardians and Children</h2>
			

			{!! Form::open(array('url' => '/guardians', 'class' => 'form-horizontal', 'role' =>
		'form', 'id' =>'loginform'))	!!}
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr class="tr_head">
					<th>Guardian</th>
					<th>Children</th>
					<th>Created</th>
					<th>Last updated</th>
					<th>Delete</th>
				</tr>
				</thead>

				<tfoot>
				<tr>
					<th>Guardians</th>
					<th>Children</th>
					<th>Created</th>
					<th>Last updated</th>
					<th>Delete</th>
				</tr>
				</tfoot>

				<tbody>
				@foreach($data as $viewdata)
					<tr>
						<td>

							{!! Form::text('name[]', $viewdata->name, array('class' => 'form-control', 'placeholder' => 'title', 'id' =>
							'form-title', 'type' => 'text', 'required' => 'required')) !!}

						</td>

						<td>


								{{--*/  $chidren_array = array() /*--}}
								@foreach($viewdata->children as $children)
									{{--*/  $chidren_array[] = $children->name /*--}}
								@endforeach
								{{--*/  $selected = '' /*--}}
							@if(!empty($chidren_array))
								{!! Form::select('children['.$viewdata->id.'][]', $chidren_array, $selected, ['multiple']) !!}
							@endif

						</td>
						<td>{{$viewdata->created_at}}</td>
						<td>{{$viewdata->updated_at}}
							{!! Form::hidden('id[]', $viewdata->id) !!}
						</td>
						<td>
							{!! Form::checkbox('delete[]', $viewdata->id, false) !!}
						</td>
					</tr>
				@endforeach
				<tr>
					<td>
						{!! Form::text('newtitle', null, array('class' => 'form-control', 'placeholder' => 'New title', 'id' =>
						'form-title', 'type' => 'text')) !!}
					</td>
					<td></td>
					<td> </td>
					<td></td>
					<td></td>
				</tr>
				</tbody>
			</table>



			<div class="form-group" style="margin-top:10px; text-align: center">
				<!-- Button -->

				<div class="col-sm-12 controls">
					{!! Form::reset('Reset', array('class' => 'btn btn-default', 'id' => 'btn-reset')) !!}
					{!! Form::submit('Update', array('class' => 'btn btn-success', 'id' => 'btn-update')) !!}
				</div>
			</div>


			{!! Form::close() !!}
			<div class="pagination"><?php echo $data->render(); ?></div>

		</div>
	</div>
@stop
