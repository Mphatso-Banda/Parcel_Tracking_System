@extends('Layouts.admin')


@section('homecontent')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php


  $twhere = "  ";
?>
<!-- Info boxes -->

        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3>{{$branchCount}}</h3>

                <p>Total Branches</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3>{{$parcelCount}}</h3>

                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3>{{$userCount}}</h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("Parcels Accepted by Courier","parcels Collected","Parcels In-Transit","Parcels Arrived At Destination","Parcels Ready to Pickup","parcels Picked-up");
               foreach($status_arr as $stats =>$stat):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
              @php
                $var = "Count".$stats;
                
              @endphp
                <h3>{{ $$var }}</h3>
                

                <p><?php echo $stat ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>


	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome {{ Auth::user()->name }}!
          	</div>
          </div>
      </div>
          



@endsection