<!DOCTYPE html>
<html class="no-js" lang="en">
{{--*/
	$host = \Request::root();
	$template = $host."/".array_rand(array('pink'=>'pink','blue'=>'blue','orange'=>'orange','green'=>'green')) or
	'blue';
/*--}}

@include('partials.header')
<body>
@yield('content')
<!-- footer starts
================================================== -->
@include('partials.footer')
<!-- footer ends
================================================== -->
<!--other jqueries required-->
@include('partials.bottom')
</body>
</html>