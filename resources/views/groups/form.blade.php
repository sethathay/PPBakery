<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>ក្រុមអ្នកប្រើប្រាស់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('groups') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ក្រុមអ្នកប្រើប្រាស់</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះ<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះ', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
			</div>
		</div>
                <div class="row">
			<div class="col-sm-12">
				<h4>កំនត់មីនុយសំរាប់ក្រុមអ្នកប្រើប្រាស់</h4>
			</div>
			<div class="col-sm-6">
                            <ul class="list-group">
                                <?php
                                    foreach($menus as $menu){
                                        $check = "";
                                        if(isset($permissions)){
                                            foreach($permissions as $per){
                                                if($per->module_id == $menu->id){
                                                    $check = "checked";
                                                    break;
                                                }
                                            }
                                        }
                                        if($menu->parents == null){
                                            echo '<li class="list-group-item">';
                                                echo '<input type="checkbox" '. $check .' style="float:right;" name="menu_id[]" value="'. $menu->id .'"></input>';
                                                echo $menu->name;
                                            echo '</li>';
                                        }else{
                                            echo '<li class="list-group-item" style="padding-left:150px;">';
                                                echo '<input type="checkbox" '. $check .' style="float:right" name="menu_id[]" value="'. $menu->id .'"></input>';
                                                echo $menu->name;
                                            echo '</li>';
                                        }
                                    }
                                ?>
                            </ul>
			</div>
		</div>
	</div>
</div>