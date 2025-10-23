<link rel="stylesheet" href="../../CSS/estilos.css">
<main>
        </div>
     <div class="container px-4 px-lg-5">
        <h3 class="txt2"> ¡Hola <?php echo $_SESSION['nom'], " ", $_SESSION['ape']; ?>!</h3>
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
           
            <div id="carouselExample" class="carousel slide" style="width: 600px; height: 200px">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../IMG/sl1.png" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
    </div>
    <div class="carousel-item">
      <img src="../../IMG/sl2.jpg" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
    </div>
    <div class="carousel-item">
      <img src="../../IMG/sl3.jpg" class="d-block w-100" alt="ERROR EN CARGAR LA IMAGEN">
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
                  
                </div>
            </div>
            <div class="card text-white bg-dark my-5 py-4 text-center">
                <div class="card-body">
                   
                </div>
            </div>
        
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Informate</h2>
                            <p class="card-text">¿Quieres hacer un reporte pero no sabes si los motivos son validos o no? ¡Informate aquí para conocer si lo puedes realizar!</p>
                            <center>
                      
                            </center>
                            <div class="card-footer"><a class="btninc" href="#!">Informate</a></div>
                            <br>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Contactanos</h2>
                            <p class="card-text">¿Necesitas ayuda o buscas avisar acerca de algún error o reporte erroneo? Envia tu mensaje y será respondida en máximo 6 días</p>
                            <center> 
                            
                            </center>
                            <div class="card-footer"><a class="btninc" href="index.php?mod=contactenos">Contactanos</a></div>
                            <br>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Realiza un reporte</h2>
                            <p class="card-text">¿Viste algún daño en la institución o a algún compañero usando mal un enser? Puedes reportar aquí </p>
                            <center> 
                            
                            </center>
                            <div class="card-footer"><a class="btninc" href="index.php?mod=reportar.php">Realizar un reporte</a></div>
                            <br>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

</main>