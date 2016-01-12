<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<link href="{{ URL::asset('css/bootstrap-3.3.2.css') }}" rel="stylesheet">



<style>
html, body {
	height: 100%;
}

body {
	margin: 0;
	padding: 0;
	width: 100%;
	display: table;
	font-weight: 100;
	font-family: "Arial Regular", "Arial";
}
.help-block{
	color: #a94442;
}
/* end left column */
@font-face {
	font-family: 'Glyphicons Halflings';
	src: url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.eot')}}');
	src:
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.eot?#iefix')}}')
		format('embedded-opentype'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.woff')}}')
		format('woff'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.ttf')}}')
		format('truetype'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular')}}')
		format('svg');
}
</style>
</head>
<body>
	<div class="container">
		<div id="loginbox" style="margin-top: 50px;"
			class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Sign In</div>
				</div>

				<div style="padding-top: 30px" class="panel-body">

					<div style="display: none" id="login-alert"class="alert alert-danger col-sm-12">
						<!-- check for login error flash var -->
					    @if(Session::has('flash_error'))
						<div class="alert-box success">
						  <h2>{{ Session::get('flash_error') }}</h2>
						</div>
						@endif						
					</div>
					{!! Form::open(array('url' => route('users.doLogin'), 'method' => 'post', 'class' => 'form-horizontal', 'role'=>'form', 'id'=>'loginform', 'data-toggle'=>'validator')) !!}
						
						<div style="margin-bottom: 15px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-user"></i> </span> <input
								id="login-username" type="text" class="form-control"
								name="username" value="" placeholder="username or email">
						</div>

						<div style="margin-bottom: 15px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-lock"></i> </span> <input
								id="login-password" type="password" class="form-control"
								name="password" placeholder="password">
						</div>



						<div class="input-group">
							<div class="checkbox">
								<label> <input id="login-remember" type="checkbox"
									name="remember" value="1"> Remember me
								</label>
							</div>
						</div>


						<div style="margin-top: 10px" class="form-group">
							<!-- Button -->

							<div class="col-sm-12 controls">
								<button type="submit" class="btn btn-md btn-success">
									<span class="glyphicon"></span> Login
								</button>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#loginform').validate({
            rules: {       
                username: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
                
            },
            messages: {
            	username: {
                    required: "Please enter a login username"
                },
                 password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                }
            },
            highlight: function(element) {
                $(element).closest('.input-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.input-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
	});

</script>
</body>
</html>
