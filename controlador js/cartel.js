/*----------Código Generado por --------------*/
/*-- Fecha : 22/11/2016 21:47:53--*/
/*-- Autores : Roy Alex Standen Barraza - Edson Carrasco Gonzales--*/
/*-- Contacto : roystandenb@gmail.com / edsoncarrascogonzalez@gmail.com --*/
// Read a page's GET URL variables and return them as an associative array.
function getVars(url)
{
    var formData = new FormData();
    var split;
    $.each(url.split("&"), function(key, value) {
        split = value.split("=");
        formData.append(split[0], decodeURIComponent(split[1].replace(/\+/g, " ")));
    });

    return formData;
}

// Variable to store your files
var files;

$( document ).delegate('#input-image','change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
    files = event.target.files;
}


$(document).ready(function () {
	//jTable 
	var carpeta = '../controlador/';
	var nombreContenedor = '#Contenedor';
	var nombreBoton = '#botonCargarRegistros';
	$(nombreContenedor).jtable({
		title: 'Tabla de Carteles',
		paging: true,
		sorting: true,
		useBootstrap: true,
		//jqueryuiTheme: true, 
		defaultSorting: 'ID_CARTEL_PRODUCTO DESC',
		actions: {
			listAction: carpeta+'cartel.php?accion=mostrar',
			//createAction: carpeta+'cartel.php?accion=crear',
			//updateAction: carpeta+'cartel.php?accion=modificar',
			deleteAction: carpeta+'cartel.php?accion=eliminar',
			createAction: function (postData) {
				var formData = getVars(postData);

				if($('#input-fotoProducto').val() !== ""){
					formData.append("NUEVA_FOTO_PRODUCTO", $('#input-fotoProducto').get(0).files[0]);
				}
				
				if($('#input-fotoFondoPantalla').val() !== ""){
					formData.append("NUEVO_FONDO_DE_PANTALLA", $('#input-fotoFondoPantalla').get(0).files[0]);
				}

				return $.Deferred(function ($dfd) {
					$.ajax({
						url: carpeta+'cartel.php?accion=crear',
						type: 'POST',
						dataType: 'json',
						data: formData,
						processData: false, // Don't process the files
						contentType: false, // Set content type to false as jQuery will tell the server its a query string request
						success: function (data) {
							$dfd.resolve(data);
							$(nombreContenedor).jtable('load');
						},
						error: function () {
							$dfd.reject();
						}
					});
				});
			},
			updateAction: function (postData) {
				var formData = getVars(postData);

				if($('#input-fotoProducto').val() !== ""){
					formData.append("NUEVA_FOTO_PRODUCTO", $('#input-fotoProducto').get(0).files[0]);
				}
				
				if($('#input-fotoFondoPantalla').val() !== ""){
					formData.append("NUEVO_FONDO_DE_PANTALLA", $('#input-fotoFondoPantalla').get(0).files[0]);
				}

				return $.Deferred(function ($dfd) {
					$.ajax({
						url: carpeta+'cartel.php?accion=modificar',
						type: 'POST',
						dataType: 'json',
						data: formData,
						processData: false, // Don't process the files
						contentType: false, // Set content type to false as jQuery will tell the server its a query string request
						success: function (data) {
							$dfd.resolve(data);
							$(nombreContenedor).jtable('load');
						},
						error: function () {
							$dfd.reject();
						}
					});
				});
			}
		},
		rowInserted: function (event, data) {
			permitir($(nombreContenedor).find('.jtable-toolbar-item.jtable-toolbar-item-add-record'),data.row.find('.jtable-edit-command-button'),data.row.find('.jtable-delete-command-button'),$(nombreContenedor));	
		},
		deleteConfirmation: function (data) {
			data.deleteConfirmMessage = 'Desea Eliminar el Permiso  <strong>' + data.record.ID_CARTEL_PRODUCTO + '</strong>';
		},
		fields: {
			ID_CARTEL_PRODUCTO: {
                key: true,
                title: 'Id',
                width: '40%',
                list: false,
                edit: false,
                create: false
            },
            ID_EFECTO: {
                title: 'Efecto',
                width: '40%',
                edit: true,
                create: true,
				options: carpeta+'cartel.php?accion=comboboxEfecto'
            },
            NOMBRE_CARTEL_PRODUCTO: {
                title: 'Producto',
                width: '40%',
                edit: true,
                create: true
            },
            DIAS_OFERTA_CARTEL_PRODUCTO: {
                title: 'Días Oferta',
                width: '40%',
                edit: true,
                create: true,
				list: true
            },
			OFERTA_CARTEL_PRODUCTO: {
                title: 'Oferta',
                width: '40%',
                edit: true,
                create: true,
				list: true
            },
			VALOR_CARTEL_PRODUCTO: {
                title: 'Valor',
                width: '40%',
                edit: true,
                create: true,
				list: true
            },
			TEXTO_INFORMATIVO_CARTEL_PRODUCTO: {
                title: 'Txt info',
                width: '40%',
                edit: true,
                create: true,
				list: true
            },
			FOTO_CARTEL_PRODUCTO: {
				title: 'Producto',
				type: 'file',
				create: false,
				edit: true,
				list: true,
				display: function(data){
					return '<img src="../fotos/fotos_productos/' + data.record.FOTO_CARTEL_PRODUCTO +  '" width="150" height="207" class="preview">';
				},
				input: function(data){
					return '<img src="../fotos/fotos_productos/' + data.record.FOTO_CARTEL_PRODUCTO +  '" width="150" height="207" class="preview">';

				},
				width: "150",
				listClass: "class-row-center"
			},
			NUEVA_FOTO_PRODUCTO: {
				title: 'Foto Producto',
				list: false,
				create: true,
				input: function(data) {
					html = '<input type ="file" id="input-fotoProducto" name="userfile" accept="image/*" />';
					return html;
				}
			},
			FONDO_PANTALLA_CARTEL_PRODUCTO: {
				title: 'Fondo Pantalla',
				type: 'file',
				create: false,
				edit: true,
				list: true,
				display: function(data){
					return '<img src="../fotos/fotos_fondos_carteles/' + data.record.FONDO_PANTALLA_CARTEL_PRODUCTO +  '" width="150" height="207" class="preview">';
				},
				input: function(data){
					return '<img src="../fotos/fotos_fondos_carteles/' + data.record.FONDO_PANTALLA_CARTEL_PRODUCTO +  '" width="150" height="207" class="preview">';

				},
				width: "150",
				listClass: "class-row-center"
			},
			NUEVO_FONDO_DE_PANTALLA: {
				title: 'Fondo de Pantalla',
				list: false,
				create: true,
				input: function(data) {
					html = '<input type ="file" id="input-fotoFondoPantalla" name="userfile" accept="image/*" />';
					return html;
				}
			},
			DURACION_CARTEL_PRODUCTO: {
				title: 'Duración',
				options: { '5000': '5 seg', '6000': '6 seg', '7000': '7 seg', '8000': '8 seg', '9000': '9 seg', '10000': '10 seg' }
			},
			TIPO_CARTEL: {
				title: 'Tipo Cartel',
				options: { 'producto-plantilla-1': 'Plantilla 1 (producto)' }
			},
			SIMULACION_CARTEL: {
				title: 'Demo',
				type: 'file',
				create: false,
				edit: false,
				list: true,
				display: function(data){
					
					return '<button type="button" onclick="window.open('+"'Carteles/controlador_carteles.php?listado="+data.record.ID_CARTEL_PRODUCTO+""+"','popup','fullscreen=yes'"+')" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>';
				}
			}
        },
		//Iniciar las validaciones cuando el formulario es creado
		formCreated: function (event, data) {
			data.form.validationEngine();
		},
		//Validar el formulario cuando ha sido enviado
		formSubmitting: function (event, data) {
			return data.form.validationEngine('validate');
		},
		//Desechar la validación cuando se cierre el formulario
		formClosed: function (event, data) {
			data.form.validationEngine('hide');
			data.form.validationEngine('detach');
		}
	});
	$(nombreBoton).click(function (e) {
		e.preventDefault();
		$(nombreContenedor).jtable('load', {
		});
	});
	$(nombreBoton).click();
});