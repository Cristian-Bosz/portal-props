<?php
    if ((!empty($_GET['status']) && $_GET['status'] == 'ok') &&
    (!empty($_GET['accion']) && ($_GET['accion'] == 'creado' || $_GET['accion'] == 'eliminado' || $_GET['accion'] == 'editado'))
    ):
    $accion = $_GET['accion'];
?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="display-6"><strong>¡Bien hecho!</strong> Tu usuario fue <b> <?= $accion ?> </b> exitosamente.</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
endif;
?>

  <section>
           <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="./assets/banner1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./assets/banner2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./assets/banner3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./assets/banner4.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    </section>


<!-- Sección de Testimonios -->
<section class="container my-5">
    <h2 class="my-2">Lo que dicen los clientes</h2>
    <p>Valoramos enormemente las relaciones sólidas y hemos visto los beneficios que aportan a nuestro negocio. La retroalimentación de los clientes es vital para ayudarnos a hacerlo bien.</p>

<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
       
            <div class="advice-container">
            <p class="paragraph">John Mcsierra</p>
            <div class="advice-details">“If your hair is thinning, try dying your hair a similar tone to your scalp.”</div>
            <div class="pattern-divider">
                <svg width="295" height="16" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#4F5D74" d="M0 8h122v1H0zM173 8h122v1H173z"></path><g transform="translate(138)" fill="#CEE3E9"><rect width="6" height="16" rx="3"></rect><rect x="14" width="6" height="16" rx="3"></rect></g></g></svg>
            </div>
            <button class="btn-testimonio">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                </svg>
            </button>
            </div>

    </div>
    <div class="col-12 col-sm-6 col-md-4">
    <div class="advice-container">
            <p class="paragraph">Agustin Zoric</p>
            <div class="advice-details">“If your hair is thinning, try dying your hair a similar tone to your scalp.”</div>
            <div class="pattern-divider">
                <svg width="295" height="16" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#4F5D74" d="M0 8h122v1H0zM173 8h122v1H173z"></path><g transform="translate(138)" fill="#CEE3E9"><rect width="6" height="16" rx="3"></rect><rect x="14" width="6" height="16" rx="3"></rect></g></g></svg>
            </div>
            <button class="btn-testimonio">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                </svg>
            </button>
            </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
    <div class="advice-container">
            <p class="paragraph">Bastian Trautman</p>
            <div class="advice-details">“If your hair is thinning, try dying your hair a similar tone to your scalp.”</div>
            <div class="pattern-divider">
                <svg width="295" height="16" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#4F5D74" d="M0 8h122v1H0zM173 8h122v1H173z"></path><g transform="translate(138)" fill="#CEE3E9"><rect width="6" height="16" rx="3"></rect><rect x="14" width="6" height="16" rx="3"></rect></g></g></svg>
            </div>
            <button class="btn-testimonio">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                </svg>
            </button>
            </div>
    </div>
</div>
   
</section>