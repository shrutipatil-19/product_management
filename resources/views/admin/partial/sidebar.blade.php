 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         @can('admin-access')
         <li class="nav-item nav-category">Main</li>
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                 <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                 <span class="menu-title">Employee</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic2">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('addEmployee') }}">Add Employee</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('listEmployee') }}">List Employee</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                 <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                 <span class="menu-title">Assign Project</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic3">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('assignProject') }}"> Assign Project</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('assignProjectList') }}"> Listed Assign Project</a></li>

                 </ul>
             </div>
         </li>
         @endcan
         @canany(['admin-access', 'employee-project-access'])
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                 <span class="menu-title"> Add Project</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('addProject') }}">Add Project</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('listProject') }}">List Project</a></li>

                 </ul>
             </div>
         </li>
         @endcanany
     </ul>
 </nav>