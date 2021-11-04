<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Megan</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
            urls: ['../assets/css/fonts.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/azzara.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
</head>

<body>
    <div class="wrapper">
        <!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="purple">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="index.html" class="logo">
                    <img src="../assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                aria-labelledby="messageDropdown">

                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                        Messages
                                        <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../assets/img/jm_denis.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                        How are you ?
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../assets/img/chadengle.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Chad</span>
                                                    <span class="block">
                                                        Ok, Thanks !
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../assets/img/mlane.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jhon Doe</span>
                                                    <span class="block">
                                                        Ready for the meeting today...
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../assets/img/talha.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Talha</span>
                                                    <span class="block">
                                                        Hi, Apa Kabar ?
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all messages<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../assets/img/profile2.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                Empresa: <span class="selection">Option 1</span><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Option 1</a></li>
                                <li><a class="dropdown-item" href="#">Option 2</a></li>
                                <li><a class="dropdown-item" href="#">Option 3</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="../assets/img/profile.jpg" alt="image profile"
                                                class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>Hizrian</h4>
                                            <p class="text-muted">hello@example.com</p><a href="profile.html"
                                                class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <a class="dropdown-item" href="#">My Balance</a>
                                    <a class="dropdown-item" href="#">Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample">
                                <span>
                                    Hizrian
                                    <span class="user-level">Administrator</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="badge badge-count">5</span>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Modulos</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-file-invoice"></i>
                                <p>Ventas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="ventas">
                                            <span class="sub-item">Listado de Ventas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="notaventa">
                                            <span class="sub-item">Notas de Venta</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cpenoenviado">
                                            <span class="sub-item">Comprobantes no Enviados</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cpependiente">
                                            <span class="sub-item">CPE pendientes de rectificación</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="resumenboleta">
                                            <span class="sub-item">Resumenes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="anulaciones">
                                            <span class="sub-item">Anulaciones</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cotizaciones">
                                            <span class="sub-item">Cotizaciones</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="creditos">
                                            <span class="sub-item">Creditos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="clientes">
                                            <span class="sub-item">Clientes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#forms">
                                <i class="fas fa-shopping-bag"></i>
                                <p>Compras</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="compras">
                                            <span class="sub-item">Listado Compras</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ordencompra">
                                            <span class="sub-item">Ordenes de Compra</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="activofijo">
                                            <span class="sub-item">Activos Fijos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="proveedor">
                                            <span class="sub-item">Proveedores</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="reporte_compra">
                                            <span class="sub-item">Reportes Avanzados</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#tables">
                                <i class="fas fa-box"></i>
                                <p>Inventario</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="resumeninventario">
                                            <span class="sub-item">Resumen Inventario</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="kardex">
                                            <span class="sub-item">Kardex</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="movimientos">
                                            <span class="sub-item">Movimientos</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="traslado">
                                            <span class="sub-item">Traslados</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="devolucion">
                                            <span class="sub-item">Devoluciones</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="notaentrada">
                                            <span class="sub-item">Nota Entrada</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="notasalida">
                                            <span class="sub-item">Nota Salida</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="reporte_inventario">
                                            <span class="sub-item">Reportes</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#maps">
                                <i class="fas fa-tag"></i>
                                <p>Productos</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="producto">
                                            <span class="sub-item">Listado Productos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="kitproducto">
                                            <span class="sub-item">Kit Producto</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="familiaproducto">
                                            <span class="sub-item">Familia Producto</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="subfamiliaproducto">
                                            <span class="sub-item">SubFamilia Producto</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="marca">
                                            <span class="sub-item">Marca</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="modelomarca">
                                            <span class="sub-item">Modelo</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="fabricante">
                                            <span class="sub-item">Fabricante</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="lineaproducto">
                                            <span class="sub-item">Linea Producto</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="atributoproducto">
                                            <span class="sub-item">Atributos Producto</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="reporte_producto">
                                            <span class="sub-item">Reporte Producto</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#charts">
                                <i class="fas fa-receipt"></i>
                                <p>Otros Comprobantes</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="retencion">
                                            <span class="sub-item">Retenciones</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="guiaremision">
                                            <span class="sub-item">Guia de Remision</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="percepcion">
                                            <span class="sub-item">Percepciones</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ordenpedido">
                                            <span class="sub-item">Ordenes de Pedido</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#persona">
                                <i class="fas fa-user-friends"></i>
                                <p>Personas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="persona">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="persona">
                                            <span class="sub-item">Listado de Personas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="empleado">
                                            <span class="sub-item">Empleados</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="transportista">
                                            <span class="sub-item">Transportistas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tipopersona">
                                            <span class="sub-item">Tipo Persona</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#finanzas">
                                <i class="fas fa-money-check-alt"></i>
                                <p>Finanzas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="finanzas">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="caja">
                                            <span class="sub-item">Caja</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ingresoegreso">
                                            <span class="sub-item">Ingresos y Egresos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cuentapagar">
                                            <span class="sub-item">Cuentas por Pagar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cuentacobrar">
                                            <span class="sub-item">Cuentas por Cobrar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pagos">
                                            <span class="sub-item">Pagos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="balance">
                                            <span class="sub-item">Balance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="proyecciones">
                                            <span class="sub-item">Proyecciones</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#users">
                                <i class="fas fa-users"></i>
                                <p>Usuarios</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="usuario">
                                            <span class="sub-item">Listado Usuarios</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="rol">
                                            <span class="sub-item">Rol de Usuario</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#ubigeo">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Ubigeo</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="ubigeo">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="departamento">
                                            <span class="sub-item">Departamentos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="provincia">
                                            <span class="sub-item">Provincias</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="distrito">
                                            <span class="sub-item">Distritos</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item active">
                            <a href="/">
                                <i class="flaticon-settings"></i>
                                <p>Configuracion</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <!--Contenido index-->
                    <input type="text" hidden id="id_temporal">
                    <?= $this->renderSection('contenido'); ?>
                </div>
            </div>

        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Topbar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
                            <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="green"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="red"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Datatables -->
    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Validation -->
    <script src="../../assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- Azzara JS -->
    <script src="../assets/js/ready.min.js"></script>

    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo.js"></script>
    <script src="../assets/js/estadovalor.js"></script>
    <script src="../assets/js/addEditRegistro.js"></script>
    <script src="../assets/js/demo.js"></script>
</body>

</html>