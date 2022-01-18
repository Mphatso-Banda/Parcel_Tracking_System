@extends('Layouts.admin')


@section('homecontent')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Branch</h1>
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
			<form action="{{url('Admin/store_branch')}}" method="post">
       @csrf
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Building</label>
                <input type="text" name="building" id="" cols="30" rows="2" class="form-control">
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">City</label>
                <input type="text" name="city" id="" cols="30" rows="2" class="form-control">
              </div>
               <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Postal_code</label>
                <input type="text" name="postal_code" id="" cols="30" rows="2" class="form-control">
              </div>
               <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Contact #</label>
                <input type="numbert" name="contact" id="" cols="30" rows="2" class="form-control">
              </div>
             
            </div>

          

            </div>
        </div>
      
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button type="submit "class="btn bg-gradient-primary mx-2" >Save</button>
  			<a class="btn bg-gradient-secondary mx-2" href="{{url('admin/index')}}">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
</form>

@endsection