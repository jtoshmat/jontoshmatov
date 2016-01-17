<style>
	#presentation{
		width:100%;
		height:100%;
		text-align: center;
		}
	#presentation img{
		width:80%;
		height:100%;
		border: 1px solid #1C1C1C;
		margin:5px;
		}

	#left_side_bar{
		float: left;
		position: relative;
		left: 0px;
		top:10%;
		height: 200px;
		width:10%;
		}


	#left_side_bar ul {
		list-style-type: none;
		margin: 0;
		padding: 20px;
		width: 100%;
		}

	#left_side_bar li a {
		display: block;
		color: #000;
		padding: 4px 0 4px 8px;
		text-decoration: none;
		}

	/* Change the link color on hover */
	#left_side_bar li a:hover {
		background-color: #555;
		color: white;
		}

	#left_side_bar .parent_li label{
		color: #f00;
		}

</style>


<div id="left_side_bar">
	<ul>
		<li class="parent_li"> <label>Links</label>
			<ul>
				<li><a href="http://www.jontoshmatov.com">Main page.</a></li>
				<li><a class="active" href="/portfolio/amfam/intro">Intro.</a></li>
				<li><a class="active" href="/portfolio/amfam/tellusaboutyourself">About You.</a></li>
				<li><a class="active" href="/portfolio/amfam/auto">Auto.</a></li>
				<li><a class="active" href="/portfolio/amfam/business">Business.</a></li>
				<li><a class="active" href="/portfolio/amfam/farm">Farm.</a></li>
				<li><a class="active" href="/portfolio/amfam/homeowners">Homeowners.</a></li>
				<li><a class="active" href="/portfolio/amfam/life">Life.</a></li>
				<li><a class="active" href="/portfolio/amfam/medical">Medical.</a></li>
				<li><a class="active" href="/portfolio/amfam/rv">RV.</a></li>
				<li><a class="active" href="/portfolio/amfam/renters">Renters.</a></li>
				<li><a class="active" href="/portfolio/amfam/travel">Travel.</a></li>
				<li><a class="active" href="/portfolio/amfam/umbrella">Umbrella.</a></li>
				<li><a class="active" href="/portfolio/amfam/findanagent">Find an agent.</a></li>
				<li><a class="active" href="/portfolio/amfam/findanagentfocus">Find an agent.</a></li>
				<li><a class="active" href="/portfolio/amfam/findanagentselected">Find an agent.</a></li>
				<li><a class="active" href="/portfolio/amfam/confirmation">Confirmation.</a></li>
				<li> <label>Links</label>
					<ul>
						<li><a class="active" href="/portfolio/amfam/php">PHP.</a></li>
						<li><a class="active" href="/portfolio/amfam/cakephp2">CakePHP 2.</a></li>
						<li><a class="active" href="/portfolio/amfam/mysql">MySQL.</a></li>
						<li><a class="active" href="/portfolio/amfam/javascript">Javascript.</a></li>
						<li><a class="active" href="/portfolio/amfam/css">CSS.</a></li>
						<li><a class="active" href="/portfolio/amfam/adobeomniture">Adobe.</a></li>
					</ul>
				</li>
			</ul>
	</ul>
</div>

<div id="presentation">
	<img src="{{$img}}">
</div>