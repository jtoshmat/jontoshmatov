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
			{!! Form::model($member, array('url' => '/users/member/'.$member->id.'/update', 'class' => 'form-horizontal', 'role' =>
			'form', 'id' =>'loginform'))	!!}
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			{{--*/  $errorClass = (session('flag'))?session('flag'):'info' /*--}}
				@if (count($errors) > 0)
					<div class="alert alert-{{$errorClass}}" role="alert">
						@foreach($errors->all() as $error)
							<p>
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
								{{ $error }}
							</p>
						@endforeach
					</div>
				@endif
				<tr>
			        <td class="tr_head">{{$member->first_name}}</td>
		        </tr>

				<tr>
			        <td>
				        <div class="input-group" style="margin-bottom: 25px">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					        {!! Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name', 'id' =>
						'profile-first-name', 'type' => 'text', 'required' => 'required')) !!}
				        </div>
			        </td>
		        </tr>

				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							{!! Form::text('middle_name', null, array('class' => 'form-control', 'placeholder' => 'Middle Name', 'id' =>
						'profile-middle-name', 'type' => 'text', 'required' => 'required')) !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							{!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name', 'id' =>
						'profile-last-name', 'type' => 'text', 'required' => 'required')) !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
							{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email', 'id' =>
						'profile-email', 'type' => 'email')) !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							{!! Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'username', 'id' =>
						'profile-slug', 'type' => 'text', 'required' => 'required','disabled' =>'disabled')) !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'id' =>
						'profile-password', 'type' => 'password', 'required' => 'required')) !!}
						</div>
					</td>
				</tr>




				<tr>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

							{{--*/  $alluserroles[] = array() /*--}}
							@foreach($member->role as $role)
								@if($role->id)
									{{--*/  $alluserroles[] = $role->id /*--}}
								@endif
							@endforeach


							@foreach($allroles as $allrole)
								@if($allrole->id)
									{{--*/ $isChecked = in_array($allrole->id, $alluserroles) /*--}}
								@else
									{{--*/ $isChecked = false /*--}}
								@endif
								{!!Form::label('role_labels', ucfirst($allrole->title), array('class' => 'roles_class'))!!}
								{!!Form::checkbox('role[]', $allrole->id, $isChecked)!!}

							@endforeach
						</div>
					</td>
				</tr>



				<tr>
					<td>

						<div class="form-group" style="margin-top:10px">
							<!-- Button -->

							<div class="col-sm-12 controls">
								{!! Form::reset('Reset', array('class' => 'btn btn-default', 'id' => 'btn-reset')) !!}
								{!! Form::button('Delete', array('class' => 'btn btn-danger', 'id' => 'btn-delete')) !!}
								{!! Form::submit('Update', array('class' => 'btn btn-success', 'id' => 'btn-update')) !!}
							</div>
						</div>

					</td>
				</tr>
			</table>
			{!! Form::close() !!}

		</div>
	</div>
@stop
