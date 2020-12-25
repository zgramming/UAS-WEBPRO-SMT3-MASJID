 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Sistem Informasi Masjid</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu Utama
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-cart-arrow-down"></i>
             <span>Produk</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Daftar Menu : </h6>
                 <a class="collapse-item" href="<?= base_url('admin/product') ?>">Produk</a>
                 <a class="collapse-item" href="<?= base_url('admin/category') ?>">Kategori</a>
                 <a class="collapse-item" href="<?= base_url('admin/unit') ?>">Unit</a>
             </div>
         </div>
     </li> -->

     <!-- Nav Item - Utilities Collapse Menu -->


     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/ustadz') ?>">
             <i class="fas fa-user"></i>
             <span>Ustadz</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKhutbah" aria-expanded="true" aria-controls="collapseKhutbah">
             <i class="fas fa-assistive-listening-systems"></i>
             <span>Khutbah</span>
         </a>
         <div id="collapseKhutbah" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Daftar Menu : </h6>
                 <a class="collapse-item" href="<?= base_url('admin/khutbah') ?>">Khutbah</a>
                 <a class="collapse-item" href="<?= base_url('admin/khutbah/category') ?>">Kategori Khutbah</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManagement" aria-expanded="true" aria-controls="collapseManagement">
             <i class="fas fa-user-friends"></i>
             Management </a>
         <div id="collapseManagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Daftar Menu : </h6>
                 <a class="collapse-item" href="<?= base_url('admin/management') ?>">Management</a>
                 <a class="collapse-item" href="<?= base_url('admin/management/category') ?>">Jabatan Management</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseInventory">
             <i class="fas fa-boxes"></i>
             Inventory </a>
         <div id="collapseInventory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Daftar Menu : </h6>
                 <a class="collapse-item" href="<?= base_url('admin/inventory') ?>">Inventory</a>
                 <a class="collapse-item" href="<?= base_url('admin/inventory/category') ?>">Kategori Inventory</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/news') ?>">
             <i class="fas fa-newspaper"></i>
             <span>Berita</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/mosque') ?>">
             <i class="fas fa-mosque"></i>
             <span>Masjid</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengaturan
     </div>

     <!-- Nav Item - Pages Collapse Menu -->

     <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-sign-out-alt"></i>
             <span>Keluar</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>

 <!-- <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li> -->