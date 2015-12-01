<?php include_once("../controladores/reportegrupoC.php");?>
<!doctype>
<!-- Vista para el acta de socializacion del microcurriculo-->
<html>
	<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Reporte Grupo (profesor) Espacio Acad&eacute;mico</title>
		<!--JQuery-->
		<script src="//code.jquery.com/jquery-2.1.3.js"></script>
		<!-- JavaScript-->
		<script type="./main.js"></script>
		<script src="../js/modernizr.js"></script>
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<!--foundation-->
        <link rel="stylesheet" href="../css/foundation.css">
	</head>
	<!--cuerpo de la pagina-->
	<body>
		<!--encabezado de la pagina-->
		<header>
			<!-- división que contiene el encabezado de la pagina-->
			<div class="encabezado">
        <img class="img1" src="../img/logouq.jpg">
				<h1><B>Programa CIDBA</B></h1>
				<h2>Reporte por grupo</h2><p><B>(profesor) del espacio acad&eacute;mico</B></p>
        <img class="img2" src="../img/logo.jpg">
			</div>
		</header>
		<div class="contenedor">
        <!--Script para listas dependientes, semestres-> materias->grupos-->
       <SCRIPT LANGUAJE="JavaScript">
                /*arreglos para planes de estudio y sus respectivos items*/
                var arrPlanes = new Array(<?php for($i=0;$i<count($planes);$i++){ if($i<(count($planes)-1)){ echo json_encode($planes[$i]).','; }else{ echo json_encode($planes[$i]);}}?> )             
          /*arreglos para semestres y sus respectivos items*/
                var arrSemestres = new Array(<?php for($i=0;$i<count($datos);$i++){ if($i<(count($datos)-1)){ echo json_encode($datos[$i]).','; }else{ echo json_encode($datos[$i]);}}?> ) 

                /*arreglos para materias y sus respectivos items*/
                var arrMaterias = new Array(<?php for($i=0;$i<count($datos2);$i++){ if($i<(count($datos2)-1)){ echo json_encode($datos2[$i]).','; }else{ echo json_encode($datos2[$i]);}}?> ) 

          /*se llenan los arreglos para los grupos*/
          var arrGrupos = new Array(<?php for($i=0;$i<count($datos3);$i++){ if($i<(count($datos3)-1)){ echo json_encode($datos3[$i]).','; }else{ echo json_encode($datos3[$i]);}}?>);
            
          //metodo que  llena las opciones de las listas despeglables segun la seleccion del usuario
          function selectChange(control, controlToPopulate, ItemArray, GroupArray)
          {
                    //variable que almacena la elección
            var myEle;
                    //contador
            var x;
                    //primero se vacia el segundo cuadro despegalbe de cualquier opcion almacenada
            for (var q=controlToPopulate.options.length;q>=0;q--) controlToPopulate.options[q]=null;

            if (control.name == "planCurricular") 
            {
                        //Se vacia el tercer cuadro despegable de cualquier opcion almacenada
              for (var q=myChoices.thirdChoice.options.length;q>=0;q--) myChoices.thirdChoice.options[q] = null;
          }
                    /*
                    *Ahora bucle a través de la matriz de elementos individuales
                    *Cualquier contiene el mismo id hijo se añaden a el segundo cuadro desplegable
                    */
          myEle = document.createElement("option") ;
            myEle.value = "" ;
            myEle.text = "-Selecciona-";
            controlToPopulate.add(myEle);
            for ( x = 0 ; x < ItemArray.length  ; x++ )
            {
              if ( GroupArray[x].depende == control.value )
                {
                  myEle = document.createElement("option") ;
                  myEle.value = GroupArray[x].pk ;
                  myEle.text = ItemArray[x].nombre ;
                  controlToPopulate.add(myEle) ;
                }
            }

          }
        </SCRIPT><!--fin del script-->

        <!--Formulario con la estructura de los cuadros despegables-->
        <form name= myChoices method="post">
          <h2>Seleccione el grupo para el reporte</h2>
          <!--se organizan los elementos del formulario en divs que contienen las listas despegables-->
           <div>
              <h3>1. Seleccione el plan curricular al que pertenece</h3>
              <select id=planCurricular name="planCurricular" onchange="selectChange(this, myChoices.firstChoice, arrSemestres, arrSemestres);" required>
              <option value="" SELECTED>-Selecciona-</option>
              <?php for($i=0;$i<count($planes);$i++){ ?>
                <option value="<?php echo $planes[$i]['pk']; ?>"><?php echo $planes[$i]['nombre']?></option>
              <?php  } ?>
            </select>
          </div>
          <div>
            <h3>2. Seleccione el semestre del espacio acad&eacute;mico</h3>
            <!--primer cuadro despegable para la seleccion de semestre-->
            <select id=firstChoice name="firstChoice" onchange="selectChange(this, myChoices.secondChoice, arrMaterias, arrMaterias);" required>
            </select>
          </div>
          <div>
            <h3>3. Seleccione el espacio acad&eacute;mico</h3>
            <!--segundo cuadro despegable para la seleccion del espacio academico-->
            <select id=secondChoice name="secondChoice" onchange="selectChange(this, myChoices.thirdChoice, arrGrupos, arrGrupos);" required>
            </select>
          </div>
          <div>
            <h3>4. Seleccione el grupo del espacio acad&eacute;mico para el reporte</h3>
            <!--tercer cuadro despegable para la seleccion del grupo-->
            <select id=thirdChoice name="thirdChoice" required>
            </select>
          </div>
             
          <section  class="contenedorCentrado">
            <!--boton que redirecciona al formulario acta de socializacion-->
             <button class="boton" type="submit" >Generar</button>
          </section>
      </form>
      </div>
  </body>
</html>
