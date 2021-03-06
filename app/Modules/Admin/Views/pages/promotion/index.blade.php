@extends('Admin::layouts.layout')

@section('content')
 <section class="content-header">
  <h1>
    Promotion Page
    <small>Promotion Page Managment</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol> -->
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
	            <div class="box-header">
	              <div class="pull-right">
	              	<a href="{!!route('admin.promotion.create')!!}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i> Add New</a>
					<button class="btn btn-danger btn-xs" id="btn-count">Remove data selected</button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            @if($promotion->count() != 0)
				<div class="box-body">

				  <table id="table-post" class="table table-bordered table-striped">
				    <thead>
					    <tr>
							<th>ID</th>
							<th data-width="60%">Articles</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
				    </thead>
				    <tbody>
					    @foreach($promotion as $item)
						<tr data-id="{!!$item->id!!}">
							<td >{!!$item->id!!}</td>
							<td><b><a href="{!!route('admin.promotion.edit',$item->id)!!}">{!!$item->name!!}</a></b></td>
							<td><img src="{!!$item->img_avatar!!}" width="100" alt=""></td>
							<td>
							<a href="{!!route('admin.promotion.edit', array($item->id) )!!}" class="btn btn-info btn-xs"> Edit </a> 
							{!!Form::open(array('route'=>array('admin.promotion.destroy',$item->id),'method'=>'DELETE', 'class' => 'inline'))!!}
							<button class="btn  btn-danger btn-xs remove-btn" type="button" attrid="{!!$item->id!!}" onclick="confirm_remove(this);"   > Remove </button>
							{!!Form::close()!!}
							</td>
						</tr>
						@endforeach
				    </tbody>
				    <tfoot>

				    </tfoot>

				  </table>
				</div>
				@else
					<h2 class="text-center">No Data</h2>
				@endif
            <!-- /.box-body -->
			</div>
			</div>	<!-- end ajax-table-->

		</div>
	</div>
</section>
@stop

@section('script')
	<!-- SCRIPT -->
	{!!Html::style(asset('public/assets/backend').'/js/DataTables/datatables.min.css')!!}
	{!!Html::script(asset('public/assets/backend').'/js/DataTables/datatables.min.js')!!}


	<script type="text/javascript">
		$(document).ready(function(){
			{!! Notification::showSuccess('alertify.success(":message");') !!}
			{!! Notification::showError('alertify.error(":message");') !!}
			
			var table = $('#table-post').DataTable({
				'ordering': false,
				"bLengthChange": false,
				"bFilter" : false,
			});
			$('#table-post tbody').on('click','tr',function(){
				$(this).toggleClass('selected');
			})
			
			$('#btn-count').click( function () {
				var data = [];
				table.rows('.selected').data().each(function(index, e){
					// console.log(index)[0];
					data.push(index[0]);
				});
				alertify.confirm('You can not undo this action. Are you sure ?', function(e){
					if(e){
						$.ajax({
							'url':"{!!route('admin.promotion.deleteall')!!}",
							'data' : {arr: data,_token:$('meta[name="csrf-token"]').attr('content')},
							'type': "POST",
							'success':function(result){
								if(result.msg = 'ok'){
									table.rows('.selected').remove();
									table.draw();
									alertify.success('The data is removed!');
								}
							}
						});
					}
				})
		    });
		})

		function confirm_remove(a){
			alertify.confirm('You can not undo this action. Are you sure ?', function(e){
				if(e){
					a.parentElement.submit();
				}
			});
		}
	</script>
@stop