<footer id="footer" class="clearfix">
	<div id="footer-inner" class="container">
		<div class="row">

			<!--first column starts-->
			<div class="span3">
				<h4>2012 © Applechic.</h4>
				<p>Write some information or quote about your liber tempor cum soluta nobis eleifend option congue nihil doming id company or product.</p>
				<img src="{{$template}}/img/logo.png" alt="logo"> </div>
			<!--first column ends-->

			<!--second column starts-->
			<div class="span3">
				<h4>Applechic Newsletter</h4>
				<p>Join applechic to receive lorem ipsum news about new products and product updates.</p>
				<p class="text-vsmall">* Some kind of declaration here.</p>
				<form  id="subform" method="post" action="subscribe-form.php">
					<fieldset>
						<p>
							<input name="email"  class="required email" type="text" placeholder="Email here">
							<input type="submit" value="OK" class="sub-submit"/>
						</p>
						<div id="subresult"></div>
					</fieldset>
				</form>
			</div>
			<!--second column ends-->

			<!--third column starts-->
			<div class="span3">
				<h4>Flickr Stream</h4>
				<div class="flickr">
					<script  type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08"></script>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--third column ends-->

			<!--fourth column starts-->
			<div class="span3 ">
				<h4>Contact Us</h4>
				<address>
					A Zend Certified PHP Engineer.<br/>
					1863 Burnett Street<br/>
					Brooklyn, NY 11229.
				</address>
				<ul class="social">
					<li><img src="{{$template}}/img/icons/icon-twitter.png" alt="icon"></li>
					<li><img src="{{$template}}/img/icons/icon-dribbble.png" alt="icon"></li>
					<li><img src="{{$template}}/img/icons/icon-googleplus.png" alt="icon"></li>
					<li><img src="{{$template}}/img/icons/icon-linkedin.png" alt="icon"></li>
					<li><img src="{{$template}}/img/icons/icon-skype.png" alt="icon"></li>
					<li><img src="{{$template}}/img/icons/icon-pinterest.png" alt="icon"></li>
				</ul>
			</div>
			<!--fourth column ends-->

		</div>
	</div>
</footer>


<!--modal for login form starts -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Login with something</h3>
	</div>
	<div class="modal-body">

		<!--form starts-->
		<div class="row">
			<div class="span5">
				<form method="post" action=".">
					<fieldset>
						<p>
							<label>Username</label>
							<input name="name"  type="text" placeholder="Username">
						</p>
						<p>
							<label>Password</label>
							<input name="password"  type="password" placeholder="Password">
						</p>
						<p>
							<input type="submit" value="Login" class="submit"/>
						</p>
					</fieldset>
				</form>
				<div class="clearfix"></div>
				<p><a href="#">Forgot username / password?</a> | <a href="#">Login with Facebook</a></p>
			</div>
		</div>
		<!--form starts-->

	</div>
</div>
<!--modal for login form ends -->