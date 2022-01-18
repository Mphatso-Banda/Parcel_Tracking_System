@extends('Layouts.admin')


@section('homecontent')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Parcel list</h1>
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
				<a class="btn btn-block btn-sm btn-secondary " href="./new_parcel"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Reference Number</th>
						<th>Sender Name</th>
						<th>Recipient Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($parcel as $parcels)

										@php
                                        static $count = 1;
                                        @endphp
					<tr>
						<td class="text-center">{{$count}}</td>
						<td><b>{{$parcels->referenceno}}</b></td>
						<td><b>{{$parcels->sendername}}</b></td>
						<td><b>{{$parcels->recipientname}}</b></td>
						<td class="text-center">
							 
							@switch ($parcels->status) 
								@case (1)
									<span class='badge badge-pill badge-info'> Collected</span>
									@break

								@case (2)
									<span class='badge badge-pill badge-primary'> In-Transit</span>
									@break
								@case (3)
									<span class='badge badge-pill badge-primary'> Arrived At Destination</span>
									@break
								@case (4)
									<span class='badge badge-pill badge-primary'> Ready to Pickup</span>
									@break
								@case (5)
									<span class='badge badge-pill badge-success'> Picked-up</span>
									@break
								
								@default:
									<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>
									
									@break
							@endswitch

							
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#approval-modal-{{$count}}">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="{{url('Admin/edit_parcel/'.$parcels->id)}}" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#delete-parcel-modal-{{$count}}">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	

					<!-- The Bookings Aproval Modal -->
					<div class="modal fade" id="approval-modal-{{$count}}">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                    
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">
                                                                        <i class="fas fa-chevron-circle-down" ></i>
                                                                            View Parcel
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        
                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">

                                                                        <div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b>{{$parcels->referenceno}}</b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>Name:</dt>
						<dd>{{$parcels->sendername}}</dd>
						<dt>Address:</dt>
						<dd>{{$parcels->senderaddress}}</dd>
						<dt>Contact:</dt>
						<dd>{{$parcels->sendercontact}}</dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd>{{$parcels->recipientname}}</dd>
						<dt>Address:</dt>
						<dd>{{$parcels->recipientaddress}}</dd>
						<dt>Contact:</dt>
						<dd>{{$parcels->recipientcontact}}</dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Parcel Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Weight:</dt>
									<dd>{{$parcels->weight}}KG</dd>
									
									<dt>Price(MWK):</dt>
									<dd>{{$parcels->price}}</dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								
							</div>
						</div>
					<dl>
						<dt>Branch Accepted the Parcel:</dt>
						<dd>
						@php	$data = \App\Models\Branch::all() @endphp
															
									@foreach($data as $info)
											@if($info->id == $parcels->branch_id_f)
																{{$info->building}}
											@endif
									@endforeach
						</dd>

						<dt>Nearest Branch to Recipient for Pickup:</dt>
							<dd>
							@php	$data = \App\Models\Branch::all() @endphp
															
								@foreach($data as $info)
										@if($info->id == $parcels->branch_id_t)
															{{$info->building}}
										@endif
								@endforeach
							</dd>
						
						<dt>Status:</dt>
						<dd>
							
							@switch ($parcels->status) 
							@case (1)
								<span class='badge badge-pill badge-info'> Collected</span>
								@break

							@case (2)
								<span class='badge badge-pill badge-primary'> In-Transit</span>
								@break
							@case (3)
								<span class='badge badge-pill badge-primary'> Arrived At Destination</span>
								@break
							@case (4)
								<span class='badge badge-pill badge-primary'> Ready to Pickup</span>
								@break
							@case (5)
								<span class='badge badge-pill badge-success'> Picked-up</span>
								@break
							
							@default:
								<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>
								
								@break
						@endswitch

							
							<span class="btn badge badge-primary bg-gradient-primary" class="close" data-dismiss="modal" id='update_status' data-toggle="modal" data-target="#update-modal-{{$count}}"><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>

                                                                        
                                                                        </div>
                                                                        
                                                                        <!-- Modal footer -->
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- End of the modal -->


											<!-- update status modal body -->

											<div class="modal fade" id="update-modal-{{$count}}">
											<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
											<h5 class="modal-title">
											
												Update status of: {{$parcels->referenceno}}
											</h5>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>


											<!-- Modal body -->
											<div class="modal-body">

											<div class="col-lg-12">
	<form action="{{url('Admin/update_status')}}" id="update-status-{{$count}}" method="post">
	@csrf
		<input type="hidden" name="id" value="{{$parcels->id}}">
		<div class="form-group">
			<label for="">Update Status</label>
			<?php $status_arr = array("Parcels Accepted by Courier","Parcels Collected","Parcels In-Transit","Parcels Arrived At Destination","Parcels Ready to Pickup","Parcels Picked-up"); ?>
			<select name="status" id="" class="custom-select custom-select-sm">
				<?php foreach($status_arr as $k => $v): ?>
					<option value="<?php echo $k ?>"><?php echo $v; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</form>
				</div>
				</div>
				<!-- end of modal body -->

	<div class="modal-footer display p-0 m-0">
        <button type="submit" class="btn btn-primary" form="update-status-{{$count}}">Update</button>
        <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" data-toggle="modal" data-target="#approval-modal-{{$count}}">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none;
		z-index: 2;
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
</div>
</div>
</div>



											<!-- End of the modal -->

	

					<!-- delete parcel modal body -->

					<div class="modal fade" id="delete-parcel-modal-{{$count}}">
											<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
											<h5 class="modal-title">
											
												<i class="fa fa-warning"></i>
											</h5>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>


											<!-- Modal body -->
											<div class="modal-body">

											<div class="col-lg-12">

											<h5 class="modal-title">
											Are you sure you want to delete the Parcel?
											</h5>
	
							</div>
							</div>
							<!-- end of modal body -->

	<div class="modal-footer display p-0 m-0">
        <a href="{{url('Admin/delete_parcel/'.$parcels->id)}}" class="btn btn-primary" form="update_status">Delete</a>
        <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none;
		z-index: 2;
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
</div>
</div>
</div>



											<!-- End of the modal -->




										@php
                                            $count++;
                                        @endphp

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
		$('.view_parcel').click(function(){
			uni_modal("Parcel's Details","view_parcel.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_parcel').click(function(){
	_conf("Are you sure to delete this parcel?","delete_parcel",[$(this).attr('data-id')])
	})
	})
	function delete_parcel($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_parcel',
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