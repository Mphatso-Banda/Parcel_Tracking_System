@extends('Layouts.admin')


@section('homecontent')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Track</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	@if(session('status'))
     <div class="alert alert-danger">{{ session('status') }}</div>
     @endif 

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
			
				<label for="">Enter Tracking Number</label>
				<div class="input-group col-sm-5">
				<form action="{{url('Admin/track_parcel')}}" id="track-parcel" method="post">
    			@csrf
                    <input type="search" name="tracking_no" class="form-control form-control-sm" placeholder="Type the tracking number here">
					</form>
                    <div class="input-group-append">
                        <button type="submit" form="track-parcel" class="btn btn-sm btn-primary btn-gradient-primary">
                            <i class="fa fa-search"></i>
                        </button>
						
                    </div>
					
                </div>
			
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                
                    <div id="content">
                        <ul class="timeline">
						@foreach($track_info as $info)
                            <li class="event" data-date="{{$info->created_at}}">
								
							<div class="card">
                				<div class="card-body">
                                

					<dl>
								
						<dd>
							
							@switch ($info->status) 
							@case (1)
								 Collected
								@break

							@case (2)
								In-Transit
								@break
							@case (3)
								Arrived At Destination
								@break
							@case (4)
								 Ready to Pickup
								@break
							@case (5)
								 Picked-up
								@break
							
							@default:
								 Item Accepted by Courier
								
								@break
						@endswitch

						</dd>
					<dl>
								
                        
								</div>
							</div>
								
                            </li>
							@endforeach

                        </ul>
                    </div>
                
            
        </div>
    </div>
</div>

<style type="text/css">
body{margin-top:20px;}
.timeline {
    border-left: 3px solid #FF4800;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    /* background: rgba(114, 124, 245, 0.09); */
    margin: 0 auto;
    letter-spacing: 0.2px;
    position: relative;
    line-height: 1.4em;
    font-size: 1.03em;
    padding: 0px;
    list-style: none;
    text-align: left;
    max-width: 40%;
}

@media (max-width: 767px) {
    .timeline {
        max-width: 98%;
        padding: 25px;
    }
}

.timeline h1 {
    font-weight: 300;
    font-size: 1.4em;
}

.timeline h2,
.timeline h3 {
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 10px;
}

.timeline .event {
    border-bottom: 1px dashed #e8ebf1;
    padding-bottom: 25px;
    margin-bottom: 25px;
    position: relative;
}

@media (max-width: 767px) {
    .timeline .event {
        padding-top: 30px;
    }
}

.timeline .event:last-of-type {
    padding-bottom: 0;
    margin-bottom: 0;
    border: none;
}

.timeline .event:before,
.timeline .event:after {
    position: absolute;
    display: block;
    top: 0;
}

.timeline .event:before {
    left: -207px;
    content: attr(data-date);
    text-align: right;
    font-weight: 100;
    font-size: 0.9em;
    min-width: 120px;
}

@media (max-width: 767px) {
    .timeline .event:before {
        left: 0px;
        text-align: left;
    }
}

.timeline .event:after {
    -webkit-box-shadow: 0 0 0 3px #727cf5;
    box-shadow: 0 0 0 3px #727cf5;
    left: -55.8px;
    background: #fff;
    border-radius: 50%;
    height: 9px;
    width: 9px;
    content: "";
    top: 5px;
}

@media (max-width: 767px) {
    .timeline .event:after {
        left: -31.8px;
    }
}

.rtl .timeline {
    border-left: 0;
    text-align: right;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    border-right: 3px solid #727cf5;
}

.rtl .timeline .event::before {
    left: 0;
    right: -170px;
}

.rtl .timeline .event::after {
    left: 0;
    right: -55.8px;
}
</style>

<script type="text/javascript">

</script>












@endsection