<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard track-logistic</title>
    <link rel="icon" href="../img/icon.png">
    
    <!--STYLESHEET-->
    <!--=================================================-->

<!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="../css/demo/nifty-demo.min.css" rel="stylesheet">



    <!--DataTables [ OPTIONAL ]-->
    <link href="../plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--JSTree [ OPTIONAL ]-->
    <link href="../plugins/jstree/themes/default/style.min.css" rel="stylesheet">


    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="../plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="../plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="../js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../js/nifty.min.js"></script>


    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="../js/demo/nifty-demo.min.js"></script>

    <!--JSTree [ OPTIONAL ]-->
    <script src="../plugins/jstree/jstree.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="../plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="../plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Premium Line Icons [ OPTIONAL ]-->
    <link href="../premium/icon-sets/icons/line-icons/premium-line-icons.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>      

    
    <script src="../js/reportes_p/load_chofer.js"></script>
    <script src="../js/reportes_p/load_dates.js"></script>
    <script src="../js/reportes_p/make_reporte.js"></script>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <?php
                      echo "<a href=\".."."/?sag=".$_GET['sag']."\" class=\"navbar-brand\">";
                    ?>
                        <img src="../img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">TrackLogistic</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <div class="username hidden-xs">Administrador</div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="../closeConnection" class="btn btn-primary">
                                        <i class="demo-pli-unlock"></i> Salir!
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Generar informe de repartos</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                  <div class="row">
                    <div class="col-sm-12 col-md-12">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Ingresa un nuevo reparto
                        </h3>
                      </div>
                      <div class="panel-body">

                        <form id="create_reporte" method="post" class="form-horizontal form-label-left">                                                    
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="chofer">Seleccione Chofer <span class="required">*</span>
                            </label>

                            <div class="col-md-5 col-sm-5 col-xs-12">
                              <div class="selector-chofer">
                                <select id="chofer" class="form-control" required>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_reparto">Estado Reparto <span class="required">*</span>
                            </label>

                              <div class="col-md-5 col-sm-5 col-xs-12">                        
                                <select id="status_reparto" class="form-control" required>
                                  <option value="1">PENDIENTE</option>
                                  <option value="2">FINALIZADO</option>
                                  <option value="3">TODOS</option>
                                </select>                      
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="init_date">Fecha Inicio <span class="required">*</span>
                            </label>
                            
                            <div class="col-md-5 col-sm-5 col-xs-12"> 
                              <div class="selector-fecha_init">
                                <select id="fecha_init" class="form-control" required>
                                </select>
                              </div>  
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date">Fecha Final <span class="required">*</span>
                            </label>
                            
                            <div class="col-md-5 col-sm-5 col-xs-12"> 
                              <div class="selector-fecha_end">
                                <select id="fecha_end" class="form-control" required>
                                </select>
                              </div>  
                            </div>
                          </div>

                          <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-sm-5 col-sm-offset-3">
                                <button type="button" id="process_reporte" class="btn btn-primary">Procesar reporte</button>
                              </div>
                          </div>
                        </form>                                                
                      </div>
                    </div>
                  </div> 
                  </div>

                  <div class="col-sm-12 col-md-12 col-lg-12" id="errorResponse" style="display:none;">
                    <div class="alert alert-danger" role="alert">
                      Informe no puede ser procesado, no existen datos. Por favor, intente con otros parámetros
                    </div>
                  </div>

                  <div id="result_report" class="row" style="display:none;">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="panel">
                        
                        <div class="panel-body">
                          <table id="clientes_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th class="min-tablet">Nombre Chofer</th>
                                <th class="min-tablet">Rut</th>
                                <th class="min-tablet">Teléfono</th>
                                <th class="min-tablet">Fecha Reparto</th>
                                <th class="min-tablet">Comuna</th>
                                <th class="min-tablet">Paquetes Recogidos</th>
                                <th class="min-tablet">Paquetes Entregados</th>
                                <th class="min-tablet">Paquetes Pendientes</th>
                                </tr>
                              </thead>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
                <!--===================================================-->
                <!--End page content-->
      </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->






            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="../img/profile-photos/11.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">Administrador</p>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">

                                        <a href="../closeConnection" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Salir
                                        </a>                                        
                                    </div>
                                </div>

                                <ul id="mainnav-menu" class="list-group">                                  

                                  <li class="list-header">Repartos y Destinos</li>

                                  <li>
                                     <?php
                                      echo "<a href=\"../comunas"."/?sag=".$_GET['sag']."\">";
                                     ?>
                                          <i class="fa fa-map"></i>
                                          <span class="menu-title">Comunas</span><i class="arrow"></i>
                                      </a>

                                  </li>

                                  <li >
                                    <?php
                                      echo "<a href=\"../choferes"."/?sag=".$_GET['sag']."\">";
                                     ?>                                      
                                          <i class="fa fa-users"></i>
                                          <span class="menu-title">Choferes</span><i class="arrow"></i>
                                      </a>

                                  </li>

                                  <li class="list-header">Estadísticas e Informes</li>

                                  <li>
                                    <?php
                                      echo "<a href=\"../statistics"."/?sag=".$_GET['sag']."\">";
                                     ?> 
                                      
                                          <i class="fa fa-bar-chart"></i>
                                          <span class="menu-title">Indicadores</span><i class="arrow"></i>
                                      </a>

                                  </li>
                                  
                                  <li>
                                    <?php
                                      echo "<a href=\"../informes"."/?sag=".$_GET['sag']."\">";
                                     ?> 
                                          <i class="fa fa-file"></i>
                                          <span class="menu-title">Generar Reportes</span><i class="arrow"></i>
                                      </a>

                                  </li> 

                                  <li class="active-sub">
                                    <?php
                                      echo "<a href=\"../personalized_report"."/?sag=".$_GET['sag']."\">";
                                     ?> 
                                          <i class="fa fa-cogs"></i>
                                          <span class="menu-title">Reportes Personalizados</span><i class="arrow"></i>
                                      </a>

                                  </li>                         
                        </ul>

                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>






            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2020 David Medina Ortiz, david.medina@cebib.cl</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
   
</body>
</html>
