<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard track-logistic</title>

    <!--STYLESHEET-->
    <!--=================================================-->

<!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">



    <!--DataTables [ OPTIONAL ]-->
    <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--JSTree [ OPTIONAL ]-->
    <link href="plugins/jstree/themes/default/style.min.css" rel="stylesheet">

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>


    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="js/demo/nifty-demo.min.js"></script>

    <!--JSTree [ OPTIONAL ]-->
    <script src="plugins/jstree/jstree.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Premium Line Icons [ OPTIONAL ]-->
    <link href="premium/icon-sets/icons/line-icons/premium-line-icons.min.css" rel="stylesheet">
   

    <script src="js/index_data/load_panel.js"></script>
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
                        <h1 class="page-header text-overflow">Mis Repartos</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                   <div class="row">

                    <div class="col-lg-12 col-md-12">
                      <div class="panel media middle pad-all">
                          <div class="media-left">
                            <?php                                                            
                                echo "<a href=\"view_pedido?chofer=".$_GET['chofer']."\">";
                              ?>
                              <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                              <i class="fa fa-map fa-2x"></i>
                              </span>
                              </a>
                          </div>
                          <div class="media-body">
                            <?php                                                            
                                echo "<a href=\"view_pedido?chofer=".$_GET['chofer']."\">";
                              ?>
                              <p class="text-2x mar-no text-semibold text-main panel1"></p>
                              <p class="text-muted mar-no">Repartos Finalizados</p>
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="panel media middle pad-all">
                          <div class="media-left">
                              <?php                                                            
                                echo "<a href=\"edit_pedido?chofer=".$_GET['chofer']."\">";
                              ?>
                                <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
                                <i class="fa fa-map fa-2x"></i>
                                </span>
                              </a>
                          </div>
                          <div class="media-body">
                              <?php                                                            
                                echo "<a href=\"edit_pedido?chofer=".$_GET['chofer']."\">";
                              ?>
                              <p class="text-2x mar-no text-semibold text-main panel2"></p>
                              <p class="text-muted mar-no">Repartos Pendientes</p>
                              </a>
                          </div>
                      </div>
                    </div>  

                    <div class="col-lg-12 col-md-12">

                      <?php                                                            
                        echo "<a href=\"add_pedido?chofer=".$_GET['chofer']."\">";
                      ?>
                      <button id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> Agregar Reparto</button>

                      </a>
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
                                            <img class="img-circle img-md" src="img/profile-photos/3.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">                                            
                                            <p class="mnp-name">Chofer</p>
                                        </a>
                                    </div>                                    
                                </div>

                                <ul id="mainnav-menu" class="list-group">                                  

                                  <li>
                                      <a href="../home">
                                          <i class="demo-pli-unlock icon-lg icon-fw"></i>
                                          <span class="menu-title">Salir</span><i class="arrow"></i>
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

            <p class="pad-lft">&#0169; 2020 ToExpress</p>



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

  <!-- modal section -->
  <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Chofer</h4>
             </div>
             <div class="modal-body">

             <form id="frmAgregar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre del chofer">
                 </div>
               </div>               

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut Chofer <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="rut" required="required" class="form-control col-md-7 col-xs-12" placeholder="Rut: Sin puntos ni digitio verificador">
                 </div>
               </div>            

               <div class="ln_solid"></div>
             </div>

             <div class="modal-footer">
               <div class="form-group">
                 <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                   <button type="reset" class="btn btn-primary">Resetear</button>
                   <button type="button" id="agregar-cliente" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>
     </div>

       <!-- modal para eliminar -->
     <div>
       <form id="frmEliminar" action="" method="POST">
         <input type="hidden" id="idchofer" name="idchofer" value="">
         <!-- Modal -->
         <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="modalEliminarLabel">Eliminar Chofer</h4>
               </div>
               <div class="modal-body">
                 ¿Está seguro de eliminar el chofer seleccionado?<strong data-name=""></strong>
               </div>
               <div class="modal-footer">
                 <button type="button" id="eliminar-cliente" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               </div>
             </div>
           </div>
         </div>
         <!-- Modal -->
       </form>
     </div>

  <div class="modal fade" id="myModalEditar" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Editar Chofer</h4>
             </div>
             <div class="modal-body">

             <form id="frmEditar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" id="idchofer" name="idchofer" value="">
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre del cliente">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut Chofer<span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="rut" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese correo del cliente">
                 </div>
               </div>
               
               <div class="ln_solid"></div>
             </div>

             <div class="modal-footer">
               <div class="form-group">
                 <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                   <button type="reset" class="btn btn-primary">Resetear</button>
                   <button type="button" id="editar-cliente" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>
     </div>     
</body>
</html>
