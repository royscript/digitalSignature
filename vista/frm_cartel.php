<?php
include_once("menu.php");
?>
<br />
<style>
#jtable-create-form {
    display: block;
    width: 450px;
    -moz-column-gap:40px;
    -webkit-column-gap:40px;
    column-gap:40px;
    -moz-column-count:2;
    -webkit-column-count:2;
    column-count:2;
}
#jtable-edit-form {
    display: block;
    width: 450px;
    -moz-column-gap:40px;
    -webkit-column-gap:40px;
    column-gap:40px;
    -moz-column-count:2;
    -webkit-column-count:2;
    column-count:2;
}
.jtable-column-header-text { margin-top: -10px !important;}
th.jtable-column-header { font-size: 11px;  height:55px;}
th.jtable-column-header-container  { font-size: 11px; height:95px;}
</style>
<div class="row">
   <div class="col-lg-12">
      <div class="box">
         <header>
            <div class="icons"><i class="fa fa-exchange"></i></div>
            <h5>Parámetros para filtrar datos</h5>
         </header>
         <div class="body">
            <form id="validVal" class="form-inline">
               <div class="row form-group">
               		
                    <div class="col-lg-4">
                     <button type="submit" class="btn btn-default" id="botonCargarRegistros"> 
                     	<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cargar Registros
                     </button>
                    </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!--END AUTOMATIC JUMP-->

   <div id="Contenedor"></div>
<link rel="stylesheet" href="../plugins/jQuery-Validation-Engine-master/css/validationEngine.jquery.css" type="text/css"/>
<script src="../plugins/jQuery-Validation-Engine-master/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="../plugins/jQuery-Validation-Engine-master/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="../controlador js/cartel.js" type="text/javascript"></script>
</body>
</html>