<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- select2 -->
  <link rel="stylesheet" href="../css/select2.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../css/sweetalert2.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../vista/adm_catalogo.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <a href="../controlador/logOut.php">Cerrar Sesion</a>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../vista/adm_catalogo.php" class="brand-link">
      <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../vista/usuario.php" class="d-block">
            <?php
                echo $_SESSION['nombre_us'];
            ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">Gestion</li>

          <li class="nav-item">
            <a href="../vista/gestion_usuarios.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../vista/gestion_atributos.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Atributos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../vista/gestion_equipos.php" class="nav-link">
              <i class="nav-icon fas fa-regular fa-house-laptop"></i>
              <p>
                Equipos
              </p>
            </a>
          </li>

          <li class="nav-header">Estado de dispositivos</li>

          <li class="nav-item">
            <a href="../vista/listas_estados.php" class="nav-link">
              <i class="nav-icon far fa-solid fa-laptop-medical"></i>
              <p>
                Status
              </p>
            </a>
          </li>

          <li class="nav-header">Tipo</li>

          <li class="nav-item">
            <a href="../vista/listas_tipos.php" class="nav-link">
              <i class="nav-icon far fa-solid fa-desktop"></i>
              <p>
                Categorias
              </p>
            </a>
          </li>

          <li class="nav-header">Reportes</li>

          <li class="nav-item">
            <a href="../vista/reportes_mantenimiento.php" class="nav-link">
              <i class="nav-icon far fa-flag"></i>
              <p>
                Mantenimiento
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../vista/reportes_muertos.php" class="nav-link">
              <i class="nav-icon far fa-regular fa-rectangle-xmark"></i>
              <p>
                Muertos
              </p>
            </a>
          </li>

          <li class="nav-header">Ubicacion</li>

          <li class="nav-item">
            <a href="../vista/listas_locaciones.php" class="nav-link">
              <i class="nav-icon far fa-solid fa-hospital"></i>
              <p>
                Locaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../vista/listas_pisos.php" class="nav-link">
              <i class="nav-icon far fa-solid fa-building"></i>
              <p>
                Pisos
              </p>
            </a>
          </li>

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>