<!DOCTYPE html>
<html lang="en">

<?php 
	
	include 'header.php' 
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark ">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
        
            <li>
              <a class="nav-link text-white"  href="./" role="button"> <large><b>@if(Auth::user()->hasRole('admin'))
                        <span>Admin</span>
                        @elseif(Auth::user()->hasRole('staff'))
                        <span>Staff</span>
                        @endif</b></large></a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
          
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li>
          <li class="nav-item dropdown">
                  <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
                    <span>
                      <div class="d-felx badge-pill">
                        <span class="fa fa-user mr-2"></span>
                        <span>{{ Auth::user()->name }}</b></span>
                        
                        <span class="fa fa-angle-down ml-2"></span>
                      </div>
                    </span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                    <a class="dropdown-item" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"><i class="fa fa-cog"></i> Profile</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                  </div>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
        <script>
          $('#manage_account').click(function(){
              uni_modal('Manage Account','manage_user.php?id=23')
            })
        </script>

@if(Auth::user()->hasRole('admin'))
<?php include 'sidebar.php'; ?>
@elseif(Auth::user()->hasRole('staff'))
<?php include 'sidebarstaff.php' ?>
@endif
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
      @yield('homecontent')


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; Group 9, 2021</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Courier Tracking System</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
