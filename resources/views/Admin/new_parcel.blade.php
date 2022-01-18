@extends('Layouts.admin')


@section('homecontent')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Parcel</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">

    <form action="{{url('Admin/store_parcel')}}" id="manage-parcel" method="post">
    @csrf
        <input type="hidden" name="id" value="">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="sender_name" id="" class="form-control form-control-sm" value="" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="" required>
              </div>
          </div>
          <div class="col-md-6">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control form-control-sm" value="" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="" required>
              </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            
          </div>
          <div class="col-md-6" id=""  >
            
              <div class="form-group" id="fbi-field">
                <label  class="control-label">Branch Processed</label>
              <select name="frombranch_id" id="from_branch_id" class="form-control form-control-sm" required="">
              <option value="" selected>Select Branch</option>

                  @foreach($branch as $branches)
                  <option value="{{$branches->id}}">{{$branches->building}}</option>

                  @endforeach
                
              </select>
            </div>
            
              <input type="hidden" name="from_branch_id" value="">
            
            <div class="form-group" id="tbi-field">
              <label for="" class="control-label">Pickup Branch</label>
              <select name="tobranch_id" id="to_branch_id" class="form-control form-control-sm" required="">
              <option value="" selected>Select Branch</option>

                @foreach($branch as $branches)
                <option value="{{$branches->id}}">{{$branches->building}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <hr>
        <b>Parcel Information</b>
        <table class="table table-bordered" id="parcel-items">
          <thead>
            <tr>
              <th>Weight</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name='weight' value="" required></td>
              <td><input type="text"  name='price' value="" required></td>
            </tr>
          </tbody>
              
        </table>
              
      </form>
			
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button type="submit" class="btn bg-gradient-primary mx-2" form="manage-parcel">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="{{url('Admin/parcel_list')}}">Cancel</a>
  		</div>
  	</div>
	</div>
</div>



@endsection