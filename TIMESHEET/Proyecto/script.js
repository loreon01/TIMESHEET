document.addEventListener("DOMContentLoaded", function() {
  const mostrarPopUpBtn = document.getElementById("subir-archivo");
  const miPopUp = document.getElementById("miPopUp");
  const cerrarPopUpBtn = document.getElementById("cerrarPopUp");

  mostrarPopUpBtn.addEventListener("click", function() {
      miPopUp.style.display = "block";
  });

  cerrarPopUpBtn.addEventListener("click", function() {
      miPopUp.style.display = "none";
  });

  window.addEventListener("click", function(event) {
      if (event.target === miPopUp) {
          miPopUp.style.display = "none";
      }
  });

  // Obtén el valor de 'id' desde la URL
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('id');

  // Asigna el valor de 'id' al campo oculto en el formulario
  document.getElementById('id').value = id;
  document.getElementById('eliminar').addEventListener('click', function() {
      window.location.href = '../php/eliminar_archivo.php';
  });



  function searchNames() {
      var input = document.getElementById("searchInput").value;
      if (input === "") {
          document.getElementById("searchResults").innerHTML = "";
          return;
      }

      // Realiza una solicitud al servidor para buscar nombres
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              document.getElementById("searchResults").innerHTML = xhr.responseText;
          }
      };
      xhr.open("GET", "../php/buscador.php?q=" + input, true);
      xhr.send();
  }
});