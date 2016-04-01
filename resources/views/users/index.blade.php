@extends('master') 

@section('content')
<style>
.table-list {
	width: 82%;
	margin: 3px auto 0;
}

.table thead {
	background: #3E5C9A;
	color: #fff;
}

.table thead th {
	text-align: center;
}

.last_td {
	text-align: center;
}

.panel-heading {
	background: #ebf4fe;
	padding: 0 0 0 10px;
	margin: 5px 0 10px;
	border: 1px solid #ccc;
}

.panel-heading img {
	width: 60px;
	height: 60px;
	vertical-align: middle;
}

.panel-heading label {
	padding: 20px;
	font-size: 24px;
	font-weight: bold;
}

.table-responsive{
	overflow: hidden;
	min-height: .01%;
}
</style>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/users_2_b.png') }}" /> <label>អ្នកប្រើប្រាស់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('create')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> បង្កើតថ្មី
			</button>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	<table class="table table-hover table-bordered table-striped" id="tbl_expense">
		<thead>
			<tr>
				<!--<th><input type="checkbox" name="checkOptionAll" /></th>-->
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Date of Birth</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php /*
		<tbody>
			
			
		<?php $i=1; ?>
			@foreach($users as $user)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td>{{ $user->last_name }}</td>
				<td>{{ $user->first_name }}</td>
				<td>{{ $user->dob }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone }}</td>
				<td class="last_td">
					<button type="button" onclick="redirectPage('show/{{ $user->id }}')" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-user"></span> View
					</button>
					<button type="button" onclick="redirectPage('edit/{{ $user->id }}')" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button type="button" onclick="redirectPage('destroy/{{ $user->id }}')" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-trash"></span> Delete
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
		*/ ?>
	</table>
</div>

<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}
	var table = $('#tbl_expense').DataTable( {

        "data": <?php echo $users ?>,
        "order": [[ 6, "desc" ]],
        "createdRow": function ( row, datas, index ) {
        	$('td', row).eq(7).addClass('last_td');
        },
        "columns": [
           	{ "data": "first_name" },
            { "data": "last_name" },
            { "data": "dob" },
            { "data": "username" },
            { "data": "email" },
            { "data": "phone" },
            { "data": null }
        ],
        "columnDefs": [ {
            "targets": -1,
            "defaultContent":
            '<button style="margin-right:5px" type="button" class="btnview btn btn-xs btn-info">'
            + '<span class="glyphicon glyphicon-user"></span> View</button>'
            +'<button style="margin-right:5px" type="button" class="btnedit btn btn-xs btn-primary">'
			+'<span class="glyphicon glyphicon-edit"></span> Edit</button>'
			+'<button type="button" class="btn btn-xs btn-danger btndelete">'
			+'<span class="glyphicon glyphicon-trash"></span> Delete'
			+'</button>'
        }
	 ]
    } );

	$('#tbl_expense tbody').on( 'click', '.btnview', function () {
        var data = table.row( $(this).parents('tr') ).data();
		$("#myModalPrint").load("{{ URL::asset('pos/print/') }}/"+data['id']+"/yes", '', function(){
			$("#myModalPrint").modal();
		});
    } );

    $('#tbl_expense tbody').on( 'click', '.btnedit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('edit/' + data['id']);
    } );

    $('#tbl_expense tbody').on( 'click', '.btndelete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var ts = $(this);
        if(confirm('តើអ្នកពិតជាចង់លុបវាពិតមែនទេ?')){
			$.ajax({
			    url: 'destroy/' + data['id'],
			    type: 'GET',
			    data:{"_token": "{{ csrf_token() }}"},
			    success: function(result) {
			    	table.row(ts.parents('tr')).remove().draw( false );
			    }
			});
		}
    } );
</script>
@stop
