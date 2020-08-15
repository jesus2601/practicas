const enviar=document.getElementById("btnEnviar");
const nombre=document.getElementById("txtNombre");
const mensaje=document.getElementById("txtComentario");

enviar.addEventListener('click',function(){
	fetch('http://localhost/practicas/php/script_form_mensajes.php',{
		method:'POST',
		headers:{
			"Content-type":"application/json; charset=utf-8"
		},
		body:JSON.stringify({
			_nombre:nombre.value,
			_comentario:mensaje.value
		})
	})
	.then(function(respuesta){
		return respuesta.json();
	})
	.then(function(json){
		console.log(json);
	})
	.catch(function(error){
		console.error("Error: ",error);
	});
});
