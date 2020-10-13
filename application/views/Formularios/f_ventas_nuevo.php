<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Droguería | Ventas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>static/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>static/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>static/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>static/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Bogota");
?>
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
        <a href="<?=site_url()?>/Welcome" class="nav-link">Inicio</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?=base_url()?>static/dist/img/logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Droguería Software</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>static/dist/img/usuario.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('nombre');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=site_url()?>/Usuarios" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url()?>/Medicamentos" class="nav-link">
              <i class="nav-icon fas fa-tablets"></i>
              <p>
                Medicamentos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url()?>/Ventas" class="nav-link active">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Ventas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url()?>/Clientes" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Cliente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Nueva Factura de Venta
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulario Nuevo</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="<?=site_url()?>/Ventas/nuevo/guardar" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="consec">Consecutivo</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" id="consec" name="consec" value="<?=$consec;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="categoria">Fecha</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" value="<?=date('d/m/Y');?>" data-mask disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="total_fact">Total</label>
                        <input type="text" class="form-control" placeholder="Total Venta" id="total_fact" name="total_fact" value="0" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control select2" name="cliente" id="cliente" style="width: 100%;">
                          <option selected="selected">Anonimo</option>
                          <?php
                            foreach($clientes as $c){
                          ?>
                          <option value="<?=$c->idCliente;?>" identificacion="<?=$c->n_identificacion;?>"><?=$c->nombre_comp;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="n_identificacion">N° identificación</label>
                        <input type="text" class="form-control" placeholder="Ingrese número" id="n_identificacion" name="n_identificacion" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="producto">Cod Producto</label>
                        <select class="form-control select2" name="producto" id="producto" style="width: 100%;">
                          <option selected="selected">Seleccione producto</option>
                          <?php
                            foreach($medicamentos as $med){
                          ?>
                          <option nombre="<?=$med->nombre;?>" valor="<?=$med->precio_u;?>" stock="<?=$med->stock;?>"><?=$med->idMedicamento;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nom_product">Nombre Producto</label>
                        <input type="text" class="form-control" id="nom_product" name="nom_product" disabled>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="cant_product">Cantidad</label>
                        <input type="number" class="form-control" id="cant_product" name="cant_product">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for=""><br/></label>
                        <button id="add_prod" type="button" class="btn btn-block btn-secondary">
                            Agregar
                        </button>
                      </div>
                    </div>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio U</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody id="tabla_art">
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="btn_submit" disabled>Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>static/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>static/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>static/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>static/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>static/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jquery-validation -->
<script src="<?=base_url()?>static/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url()?>static/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>static/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>static/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  //Money Euro
  $('[data-mask]').inputmask()

  $('#quickForm').validate({
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  $("#cliente").change(function(){
    var n_id = $("#cliente option:selected").attr('identificacion');
    $("#n_identificacion").val(n_id);
  });

  $("#producto").change(function(){
    var nombre = $("#producto option:selected").attr('nombre');
    $("#nom_product").val(nombre);
  });

  $("#add_prod").click(function(){
    var product = $('#nom_product').val();
    var cantidad = $("#cant_product").val();
    if(product!=="" && cantidad!==""){
      var stock = $("#producto option:selected").attr('stock');
      if(stock<cantidad){
        alert('La cantidad solicitado es mayor a la que se tiene en stock.');
        $("#cant_product").focus();
      }
      else{
        var id = $("#producto").val();
        var validacion_d = valid_dup_product(id);
        if(validacion_d===true){
          alert('El producto seleccionado ya fue agregado');
        }
        else{
          var precio = parseInt($("#producto option:selected").attr('valor'));
          cantidad = parseInt(cantidad);
          var total = cantidad*precio;
          $("#tabla_art").append("<tr><td><input value='"+id+"' name='productos[]' style='display: none;'/>"+id+"</td><td>"+product+"</td><td><input value='"+cantidad+"' name='cant_p_"+id+"' style='display: none;'/>"+cantidad+"</td><td>"+precio+"</td><td>"+total+"</td></tr>");
          var total_fact = parseInt($("#total_fact").val())+total;
          $("#total_fact").val(total_fact);
          $("#btn_submit").attr('disabled',false);
        }
      }
    }
  });

  $("#quickForm").submit(function(){
    $("#total_fact").attr('disabled',false);
  });

  function valid_dup_product(id_product){
    var elementos = document.getElementsByName("productos[]");

    for(var i=0; i<elementos.length; i++) {
      if(elementos[i].value==id_product){
        return true;
      }
    }
    return false;
  }
});
</script>
</body>
</html>
