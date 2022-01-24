@extends('Layouts.admin')


@section('homecontent')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff List</h1>
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
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./new_staff"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Staff</th>
						<th>Email</th>
						<th>Branch</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($user as $users)

					@php
					static $count = 1;
					@endphp
					
					<tr>
						<td class="text-center">{{$count}}</td>
						<td><b>{{$users->name}}</b></td>
						<td><b>{{$users->email}}</b></td>
						<td><b>{{$users->branch->building}} {{$users->branch->city}}</b></td>
						
						<td class="text-center">
		                    <div class="btn-group">
		                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-staff-modal-{{$count}}">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	

					<!-- delete staff modal body -->

					<div class="modal fade" id="delete-staff-modal-{{$count}}">
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
											Are you sure you want to delete the <b>{{$users->name}}</b>?
											</h5>
	
							</div>
							</div>
							<!-- end of modal body -->

							<div class="modal-footer display p-0 m-0">
								<a href="{{url('Admin/delete_staff/'.$users->id)}}" class="btn btn-primary" form="update_status">Delete</a>
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


@endsection