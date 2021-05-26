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
                   <ul class="navbar-nav ">
                       <li class="nav-item active">
                           <a href="<?= base_url("home") ?>" class="nav-link">Home</a>
                       </li>
                       <li class="nav-item active">
                           <a href="<?= session('uid') == null ? base_url("login") : base_url("/Menu/dashboard") ?>" class="nav-link"><?= session('uid') == null ? 'Masuk' : 'Dashboard' ?></a>
                       </li>
                   </ul>
               </div>
           </div>
       </nav>
       <!--/.Navbar-->
   </header>
   <!--Main Navigation-->