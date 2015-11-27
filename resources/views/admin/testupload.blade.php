@extends('master')
@section('content')
	<div class="panel panel-info">





		<div class="panel-body" style="padding-top:30px">
			{!! Form::open(array('url' => 'admin/playground', 'files'=>true, 'class' => 'form-horizontal', 'role' => 'form', 'id' =>
				'testuploadform'))	!!}
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<tr class="tr_head">
					<td colspan="2"><h4>A test Cloudinary upload</h4></td>
				</tr>
				<tr>
					<td>Select your file: </td>
					<td>
						<div class="input-group" style="margin-bottom: 25px">
							{!! Form::file('yourfile') !!}
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="form-group" style="margin-top:10px">
							<div class="col-sm-12 controls" style="text-align: center">
								{!! Form::reset('Reset', array('class' => 'btn btn-default', 'id' => 'btn-reset')) !!}
								{!! Form::submit('Upload', array('class' => 'btn btn-success', 'id' => 'btn-upload')) !!}
							</div>
						</div>
					</td>
				</tr>
			</table>
			{!! Form::close() !!}
		</div>
	</div>
@stop
