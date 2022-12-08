document.getElementById("total_venta").addEventListener("click",n1);

function n1() {
	let actual = document.getElementById('cantidad_producto').value;
	let sumado = document.getElementById("precio_unitario").value;
	document.getElementById('resultado').innerHTML = actual * sumado
}