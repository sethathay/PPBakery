<!DOCTYPE html>
<html>
<head>
<title>ហាងនំបុ័ងភ្នំពេញ</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<link href="{{ URL::asset('css/bootstrap-3.3.2.css') }}" rel="stylesheet">

<style>

.container {
	display: table-cell;
	vertical-align: top;
}

.content {
	display: inline-block;
	padding: 0;
	margin: 0;
}

.title {
	font-size: 96px;
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

.footer {
	background-color: #3E5C9A;
	height: 30px;
	color: #fff;
	position:fixed;
	bottom: 0;
	text-align: center;
}
.footer_content{
	padding-top: 5px;
}
</style>
</head>
<body>
	<div class="cover-container">
		<div id="loginbox" style="margin-top: 50px;"
			class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">ហាងនំបុ័ងភ្នំពេញ</div>
				</div>

				<div style="padding-top: 30px" class="panel-body">
					<!-- check for login error flash var -->
					@if(Session::has('flash_error'))
						<div id="login-alert" class="alert alert-danger col-sm-12">
							<div id="flash_notice">{{ Session::get('flash_error') }}</div>
						</div>
					@endif
					{!! Form::open(array('url' => route('users.doLogin'), 'method' =>
					'post', 'class' => 'form-horizontal', 'role'=>'form',
					'id'=>'loginform', 'data-toggle'=>'validator')) !!}

					<div style="margin-bottom: 15px" class="input-group">
						<span class="input-group-addon"><i
							class="glyphicon glyphicon-user"></i> </span> <input
							id="login-username" type="text" class="form-control"
							name="username" value="" placeholder="ឈ្មោះអ្នកប្រើប្រាស់">
					</div>

					<div style="margin-bottom: 15px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span> 
						<input id="login-password" type="password" class="form-control" name="password" placeholder="លេខសំងាត់">
					</div>

					<div style="margin-top: 10px" class="form-group">
						<!-- Button -->
						<div class="col-sm-12 controls">
							<button type="submit" class="btn btn-md btn-success">
								<span class="glyphicon"></span> ចូលទៅកាន់ប្រព័ន្ធ
							</button>

						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 footer">
			<div class="footer_content">ហាងនំបុ័ងភ្នំពេញ © {!! date('Y') !!}</div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#login-username").focus();
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
                    required: "* សូមបញ្ចូលឈ្មោះរបស់អ្នក"
                },
                 password: {
                    required: "* សូមបញ្ចូលលេខសំងាត់របស់អ្នក",
                    minlength: "* លេខសំងាត់ត្រូវតែចាប់ពី ៥ ខ្ទង់ឡើងទៅ"
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
