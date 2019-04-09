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
		title: 'Tabla de Orden de Carteles',
		paging: true,
		sorting: true,
		useBootstrap: true,
		//jqueryuiTheme: true, 
		defaultSorting: 'ID_REPRODUCCION DESC',
		actions: {
			listAction: carpeta+'orden.php?accion=mostrar',
			createAction: carpeta+'orden.php?accion=crear',
			updateAction: carpeta+'orden.php?accion=modificar',
		},
		rowInserted: function (event, data) {
			permitir($(nombreContenedor).find('.jtable-toolbar-item.jtable-toolbar-item-add-record'),data.row.find('.jtable-edit-command-button'),data.row.find('.jtable-delete-command-button'),$(nombreContenedor));	
		},
		deleteConfirmation: function (data) {
			data.deleteConfirmMessage = 'Desea Eliminar el Permiso  <strong>' + data.record.ID_REPRODUCCION + '</strong>';
		},
		fields: {
			ID_REPRODUCCION: {
                key: true,
                title: 'Id',
                width: '40%',
                list: false,
                edit: false,
                create: false
            },
            ID_CARTEL_PRODUCTO: {
                title: 'Cartel',
                width: '40%',
                edit: true,
                create: true,
				options: carpeta+'orden.php?accion=comboboxCarteles'
            },
            ORDEN_REPRODUCCION: {
                title: 'Orden',
                width: '40%',
                edit: true,
                create: true
            },
			SIMULACION_CARTEL: {
				title: 'Demo',
				type: 'file',
				create: false,
				edit: false,
				list: true,
				display: function(data){
					
					return '<button type="button" onclick="window.open('+"'Carteles/controlador_todos_los_carteles.php','popup','fullscreen=yes'"+')" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>';
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