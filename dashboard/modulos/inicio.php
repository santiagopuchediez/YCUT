<link rel="stylesheet" href="../../CSS/estilos.css">
<main>
        </div>
     <div class="container px-4 px-lg-5">
        <h3 class="txt3"> ¡Hola <?php echo $_SESSION['nom'], " ", $_SESSION['ape']; ?>!</h3>
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
           
            <div id="carouselExample" class="carousel slide" style="width: 600px; height: 200px">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../img/sl1.png" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
    </div>
    <div class="carousel-item">
      <img src="../../img/sl2.jpg" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
    </div>
    <div class="carousel-item">
      <img src="../../img/sl3.jpg" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

                
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Yo cuido, y ¿Tú?</h1>
                    <p>De un proyecto a una realidad. En la institución Educariva Federico Ozanam se necesita un verdadero sentido de pertenencia y tú <?php echo $_SESSION['nom'], " ", $_SESSION['ape']; ?> puedes ser parte de ello. Reporta y ayudanos a mejorar la calidad de nuestro colegio.</p>
                    <a class="btninc" href="#!">Realizar Un Reporte</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-dark my-5 py-4 text-center">
                <div class="card-body">
                    <label for="modal-reportes" class="btn-modal">Ver Ranking de Reportes</label>
                    <input type="checkbox" id="modal-reportes" hidden>
                    <div class="modal">
                    <label for="modal-reportes" class="modal-bg"></label>
                    <div class="modal-box">
                        <h3 style="color: #000">Ranking de Grupos con Más Reportes</h3>
                        <ol>
                        <li style="color: #000">Grupo 8°1 — 12 reportes</li>
                        <li style="color: #000">Grupo 9°2 — 10 reportes</li>
                        <li style="color: #000">Grupo 7°4 — 9 reportes</li>
                        <li style="color: #000">Grupo 10°2 — 6 reportes</li>
                        <li style="color: #000">Grupo 6°3 — 4 reportes</li>
                        </ol>
                        <label for="modal-reportes" class="btn-cerrar">Cerrar</label>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Informate</h2>
                            <p class="card-text">¿Quieres hacer un reporte pero no sabes si los motivos son validos o no? ¡Informate aquí para conocer si lo puedes realizar!</p>
                            <center>
                            <img src="../../img/d1.avif" width="100%" height="40%" style="border-radius: 5px">
                            </center>
                        </div>
                        <div class="card-footer"><a class="btninc" href="#!">Informate</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Contactanos</h2>
                            <p class="card-text">¿Necesitas ayuda con algo o buscas avisar acerca de algún error o reporte erroneo? Envia tu solicitud y será respondida en máximo 6 días</p>
                            <center> 
                            <img src="../../img/d3.png" width="70%" height="20%" style="border-radius: 5px">
                            </center>
                        </div>
                        <div class="card-footer"><a class="btninc" href="#!">Contactanos</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Mapa</h2>
                            <p class="card-text">¡Conoce qué zonas y cuales grupos cuentan con más cantidad de reportes en la institución! Este mapa se actualiza mensualmente. </p>
                            <center> 
                            <img src="../../img/d2.png" width="70%" height="20%" style="border-radius: 5px">
                            </center>
                        </div>
                        <div class="card-footer"><a class="btninc" href="#!">Ver Mapa</a></div>
                    </div>
                </div>
            </div>
        </div>

</main>