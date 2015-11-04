<!doctype>
<!-- Vista principal-->
<html>
	<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Plan curricular</title>
		<!--JQuery-->
		<script src="//code.jquery.com/jquery-2.1.3.js"></script>
		<!--JavaScript-->
		<script type="./main.js"></script>
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	<!--cuerpo de la pagina-->
	<body>
		<!--encabezado de la pagina-->
		<header>
			<!-- división que contiene el encabezado de la pagina-->
			<div class="encabezado">
				<h1>Programa CIDBA</h1>
				<h2>Universidad del Quind&iacute;o</h2>
			</div>
		</header>
		<!-- división que contiene la lista despegable de la pagina-->
    	<div class="row">
    		<h2>Seleccione su grupo</h2>
    		<!--Script para listas dependientes, semestres-> materias->grupos-->
    		<SCRIPT LANGUAJE="JavaScript">
    			/*arreglos para materias y sus respectivos items*/
    			var arrMaterias = new Array();
    			var arrMateriasGrp = new Array();

    			/*Se llenan los arreglos para las materias*/
    			arrMaterias[0]="Metodologia y estrategias de la modalidad";
    			arrMateriasGrp[0] = 1;
    			arrMaterias[1]="Expresion oral y escrita";
    			arrMateriasGrp[1]= 1;

    			arrMaterias[2]="Proficiencia en español";
    			arrMateriasGrp[2]=2;
    			arrMaterias[3]="redaccion";
    			arrMateriasGrp[3]=2;

    			arrMaterias[4]="Semiotica";
    			arrMateriasGrp[4]=3;
    			
    			/*se llenan los arreglos para los grupos*/
    			var arrGrupos = new Array();
    			var arrGruposGrp = new Array();

    			arrGrupos[60]="Grupo 1";
    			arrGruposGrp[60]=0;
    			arrGrupos[61]="Grupo 2";
    			arrGruposGrp[61]=0;

    			arrGrupos[62]="Grupo 1";
    			arrGruposGrp[62]=4;
    			arrGrupos[63]="Grupo 8";
    			arrGruposGrp[63]=4;


    			//metodo que  llena las opciones de las listas despeglables segun la seleccion del usuario
    			function selectChange(control, controlToPopulate, ItemArray, GroupArray)
    			{
                    //variable que almacena la elección
    				var myEle;
                    //contador
    				var x;
                    //primero se vacia el segundo cuadro despegalbe de cualquier opcion almacenada
    				for (var q=controlToPopulate.options.length;q>=0;q--) controlToPopulate.options[q]=null;
  						if (control.name == "firstChoice") 
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
  					myEle.text = "-Selecciona-" ;
  					controlToPopulate.add(myEle) ;
  					for ( x = 0 ; x < ItemArray.length  ; x++ )
   					{
     					if ( GroupArray[x] == control.value )
       					{
         					myEle = document.createElement("option") ;
         					myEle.value = x ;
        					myEle.text = ItemArray[x] ;
        					controlToPopulate.add(myEle) ;
       					}
    				}

    			}
    		</SCRIPT><!--fin del script-->
            <!--Formulario con la estructura de los cuadros despegables-->
    		<form name= myChoices method="post" action="">
                <!--se organizan los elementos del formulario en una tabla-->
    			<table aling="center">
    				<tr>
    					<td>
                            <h3>1. Seleccione el semestre del espacio acad&eacute;mico</h3>
                            <!--primer cuadro despegable para la seleccion de semestre-->
    						<select id=firstChoice name="firstChoice" onchange="selectChange(this, myChoices.secondChoice, arrMaterias, arrMateriasGrp);" required>
								<option value="" SELECTED>-Selecciona-</option>
								<option value=1>Semestre 1</option>
								<option value=2>Semestre 2</option>
								<option value=3>Semestre 3</option>
							</select>
    					</td>
                    </tr>
                    <tr>
                        <td>
                            <h3>2. Seleccione el espacio acad&eacute;mico</h3>
                            <!--segundo cuadro despegable para la seleccion del espacio academico-->
						    <select id=secondChoice name="secondChoice" onchange="selectChange(this, myChoices.thirdChoice, arrGrupos, arrGruposGrp);" required>
						</select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>3. Seleccione el grupo del espacio acad&eacute;mico al cual esta inscrito</h3>
                            <!--tercer cuadro despegable para la seleccion del grupo-->
						    <select id=thirdChoice name="thirdChoice" required>
						</select>
    					</td>
    				</tr>
    			</table>
                <section  class="contenedorCentrado">
                    <!--boton que redirecciona al formulario acta de socializacion-->
                    <button class="boton" type="submit" formaction="actaSocializacion.php">Continuar</button>
                </section>
			</form>
    	</div>
	</body>
</html>
