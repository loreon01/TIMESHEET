var proyectosContainer = document.getElementById('../Menu/proyectos-container');
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            proyectosContainer.innerHTML = xhr.responseText;

            
            proyectosContainer.addEventListener('click', function(event) {
                var target = event.target;
                if (target.classList.contains('proyecto-cuadro')) {
                    
                    var proyectoID = target.getAttribute('data-proyecto-id');
                    
                    window.location.href = '../Proyecto/proyecto.php';
                }
            });
        }
    };
    var urlParams = new URLSearchParams(window.location.search);
    var idFromURL = urlParams.get("id");
    xhr.open('GET', '../php/componente_proyecto.php?id=' + idFromURL, true); 
    xhr.send();


