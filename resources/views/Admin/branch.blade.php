
@extends('Layouts.admin')


@section('homecontent')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Branches</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     @if(session('status'))
     <div class="alert alert-success">{{ session('status') }}</div>
     @endif 
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-secondary " href="{{url('Admin/add_branch')}}"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Building.</th>
						<th>City</th>
						<th>Postal_code</th>
						<th>Contact #</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($branch as $branchdat)
					
					<tr>
						<td class="text-center">{{$branchdat->id}}</td>
						
						<td><b>{{$branchdat->building}}</b></td>
						<td><b>{{$branchdat->city}}</b></td>
						
						<td><b>{{$branchdat->postal_code}}</b></td>
						<td><b>{{$branchdat->contact}}</b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="{{url('Admin/edit_branch/'.$branchdat->id)}}" class="btn btn-primary ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <a href="{{url('Admin/delete_branch/'.$branchdat->id)}}" class="btn btn-danger ">
		                          <i class="fas fa-trash"></i>
		                        </a>
	                      </div>
						</td>
					</tr>	
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_branch').click(function(){
			uni_modal("branch's Details","view_branch.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_branch').click(function(){
	_conf("Are you sure to delete this branch?","delete_branch",[$(this).attr('data-id')])
	})
	})
	function delete_branch($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_branch',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

@endsection