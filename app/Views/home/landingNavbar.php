   <!--Main Navigation-->
   <header>
       <!--Navbar-->
       <nav class="navbar navbar-expand-lg font-weight-bold">
           <!-- Additional container -->
           <div class="container">
               <!-- Navbar brand -->
               <a class="navbar-brand">
                   <img class="mr-3 d-inline-block align-top" src="<?= base_url('../img/icon/favicon-32x32.png') ?>" width="30" height="30" alt="Logo Brand">
                   IBMAETER
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                   <i class="fas fa-fw fa-bars"></i>
               </button>
               <div class="collapse navbar-collapse" id="navbarText">
                   <span class="navbar-text mr-auto"></span>
                   <ul class="navbar-nav">
                       <li class="nav-item active me-3">
                           <a href="<?= base_url("home") ?>" class="nav-link"><i class="fas fa-home fa-fw me-1"></i>Home</a>
                       </li>
                       <li class="nav-item active me-3">
                           <a href="<?= base_url("home/KebijakanPrivasi") ?>" class="nav-link"><i class="fas fa-user-shield fa-fw me-1"></i>Kebijakan Privasi</a>
                       </li>
                       <li class="nav-item active me-3">
                           <a href="<?= base_url("home/WaspadaPenipuan") ?>" class="nav-link"><i class="fas fa-skull fa-fw me-1"></i>Waspada Penipuan</a>
                       </li>
                       <li class="nav-item active me-3">
                           <a href="<?= session('uid') == null ? base_url("login") : base_url("/Menu/dashboard") ?>" class="nav-link"><i class="fas fa-sign-in-alt fa-fw me-1"></i><?= session('uid') == null ? 'Masuk' : 'Dashboard' ?></a>
                       </li>
                   </ul>
               </div>
           </div>
       </nav>
       <!--/.Navbar-->
       <img src="../img/home/HHome.png">
   </header>
   <!--Main Navigation-->