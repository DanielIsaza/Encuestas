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
    			arrGrupos[63]="Grupo 2";
    			arrGruposGrp[63]=4;


    			/*metodo*/
    			function selectChange(control, controlToPopulate, ItemArray, GroupArray)
    			{
    				var eleccion;
    				var x;

    				for (var q=controlToPopulate.options.length;q>=0;q--) controlToPopulate.options[q]=null;
  						if (control.name == "firstChoice") 
  					{
    					for (var q=myChoices.thirdChoice.options.length;q>=0;q--) myChoices.thirdChoice.options[q] = null;
 					}
 					myEle = document.createElement("option") ;
  					myEle.value = 0 ;
  					myEle.text = "[Selecciona]" ;
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
    		</SCRIPT>
    		<form name= myChoices method="post" action="">
    			<table aling="center">
    				<tr>
    					<td>
    						<select id=firstChoice name="firstChoice" onchange="selectChange(this, myChoices.secondChoice, arrMaterias, arrMateriasGrp);">
								<option value=0 SELECTED>[Selecciona]</option>
								<option value=1>Semestre 1</option>
								<option value=2>Semestre 2</option>
								<option value=3>Semestre 3</option>
							</select>
    					</td><td>

						<select id=secondChoice name="secondChoice" onchange="selectChange(this, myChoices.thirdChoice, arrGrupos, arrGruposGrp);">
						</select>
						<select id=thirdChoice name="thirdChoice">
						</select>
    					</td>
    				</tr>
    			</table>
			</form>
    		<!--<h2>><a href="#">Plan curricular</h2></a>
    		<h2>..><a href="#">Semestre I</h2></a>
    		<h2>....><a href="#">Materia 1</h2></a>-->
    	</div>
	</body>
</html>
