$(document).on("ready", arranque);

function arranque()
{
	$("#Datos").on("submit", Datos_Submit);
}

function Datos_Submit(evento)
{
	evento.preventDefault();

	$.post("../rtmpClient/pr.php", 
		{
			NombreAplicacion: $("#txtNombreAplicacion").val(),
			NombreStream: $("#txtNombreStream").val(),
			PuntosMontaje: $("#txtNoPuntosMontaje").val(),
			Usuario: $("#txtUsuario").val(),
			Clave: $("#txtClave").val(),
			Limite: $("#txtLimiteConcurrencias").val()
		}
			);

	$("#Datos input").val("");
	$("#btnCrear").val("Crear");

}