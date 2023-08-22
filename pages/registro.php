

<aside class='container-fluid bg-register pb-5'>
        <div class='container'>
           <h2 class='display-6 fw-bold text-center pt-5 register-title'>Register</h2>
            <form action="features/registro_feature.php" method="post">
                <div class='row justify-content-center'>
                  <div class='col-12 col-sm-8 col-md-7 col-lg-5 col-xl-4 justify-content-center form-container my-5'>
               
                <p class="my-3">Información de acceso</p>

                <div class="col-12 my-3">
                    <div class="form-floating">
                        <input type='text' class="form-control" name="email" id="email" placeholder="Email" required/>
                        <label htmlFor="floatingInput">Email</label>
                        <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['email'])):
                                    ?>
                                    
                                       <p class="text-danger ms-1"> <?= $_SESSION['errores']['email'] ?> </p>
                                   
                                <?php
                                endif;
                                ?>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="form-floating">
                        <input type='password' class="form-control" name="pass" id="pass" placeholder="Contraseña" required/>
                        <label htmlFor="floatingInput">Contraseña</label>
                        <div id="passwordHelpBlock" class="form-text ms-1">
                        Tu contraseña debe tener entre 8-16 caractéres.
                        </div>
                        <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['pass'])):
                                    ?>
                                    
                                       <p class="text-danger ms-1"> <?= $_SESSION['errores']['pass'] ?> </p>
                                   
                                <?php
                                endif;
                                ?>
                    </div>
                </div>
                    
              <hr class="w-100 clearfix" />
              <p class="my-3">Datos</p>
   <div class="col-12 my-3">
                    <div class="form-floating">
                        <input type='text' class="form-control" name="nombre" id="nombre" placeholder="Nombre" required/>
                        <label htmlFor="floatingInput">Nombre</label>
                        <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['nombre'])):
                                    ?>
                                    
                                       <p class="text-danger ms-1"> <?= $_SESSION['errores']['nombre'] ?> </p>
                                   
                                <?php
                                endif;
                                ?>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="form-floating">
                        <input type='text' class="form-control" name="apellido" id="apellido" placeholder="Apellido" required/>
                        <label htmlFor="floatingInput">Apellido</label>
                        <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['apellido'])):
                                    ?>
                                    
                                       <p class="text-danger ms-1"> <?= $_SESSION['errores']['apellido'] ?> </p>
                                   
                                <?php
                                endif;
                                unset($_SESSION['errores']);
                                ?>
                    </div>
                </div>


                    <div class='col-12 d-grid gap-2 my-3 align-self-center text-center'>
                      <button type="submit" id="btn-register" class="btn">Sign up</button>  
                    </div>  

                    <hr class="w-100 clearfix" />
                    <p class='text-decoration-none text-center'>Already on Props?  <a href='index.php?seccion=login' class='text-decoration-none'>Log in</a></p>
                  </div>
                    
                </div>
            </form>
        </div>
    </aside>