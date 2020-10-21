<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
<!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">{{ Auth::user()->name }}</a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview menu-open">
           <a href="#" class="nav-link active">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <!-- <li class="nav-item">
           <a href="pages/widgets.html" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Widgets
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
         </li> -->
         @can('isAdmin')
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Sales Managers
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('salesmanagers') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Sales Manager List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createsalesmanager') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New Sales Manager</p>
               </a>
             </li>
            </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Categories
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('categories') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Category List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createcategory') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New category</p>
               </a>
             </li>
            </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Brands
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('brands') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Brand List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createbrand') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New Brand</p>
               </a>
             </li>
            </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Products
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('products') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Product List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createproduct') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New Product</p>
               </a>
             </li>
            </ul>
         </li>

         @endcan
        @canany(['isAdmin', 'isSalesManager'])
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Clients
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('clients') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Client List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('createclient') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Client</p>
              </a>
            </li>
          </ul>
        </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list"></i>
             <p>
               Booking
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('booking') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Booking List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createbooking') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New Booking</p>
               </a>
             </li>
           </ul>
         </li>
         @endcanany
         @can('isSalesManager')
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list"></i>
             <p>
               Operators
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ route('operators') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Operator List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('createoperator') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add New Operator</p>
               </a>
             </li>
           </ul>
         </li>
         @endcan
         @can('isOperator')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('operators') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OrderList</p>
                </a>
              </li>

            </ul>
          </li>
          @endcan
         <li class="nav-item has-treeview">
           <a href="{{ route('changepassword')}}" class="nav-link">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Change Password
             </p>
           </a>

         </li>
         <li class="nav-header">EXAMPLES</li>
         <li class="nav-item">
           <a href="pages/calendar.html" class="nav-link">
             <i class="nav-icon far fa-calendar-alt"></i>
             <p>
               Calendar
               <span class="badge badge-info right">2</span>
             </p>
           </a>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon far fa-envelope"></i>
             <p>
               Mailbox
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="pages/mailbox/mailbox.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Inbox</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/mailbox/compose.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Compose</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/mailbox/read-mail.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Read</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-book"></i>
             <p>
               Pages
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="pages/examples/invoice.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Invoice</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/profile.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Profile</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/login.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Login</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/register.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Register</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/lockscreen.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Lockscreen</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon far fa-plus-square"></i>
             <p>
               Extras
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="pages/examples/404.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Error 404</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/500.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Error 500</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/blank.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Blank Page</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="starter.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Starter Page</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Legacy User Menu</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-header">MISCELLANEOUS</li>
         <li class="nav-item">
           <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <i class="nav-icon fas fa-file"></i>
             <p>Logout</p>
           </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
