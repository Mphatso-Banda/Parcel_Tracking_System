@extends('Layouts.customer')

@section('track_parcel')

<!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-primary mb-4">Safe & Faster</h1>
            <h1 class="text-white display-3 mb-5">Courier Services</h1>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                <form action="{{url('Customer/track_parcel')}}" id="track-parcel" method="post">
    			@csrf
                <form>
                    <input type="text" name="tracking_no" form="track-parcel" class="form-control border-light" style="padding: 30px;" placeholder="Tracking Number">
                    <div class="input-group-append">
                        <button form="track-parcel" class="btn btn-primary px-3">Track </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

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