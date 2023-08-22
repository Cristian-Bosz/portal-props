
<aside class='container-fluid bg-register pb-5'>
        <div class='container'>
           <h2 class='display-6 fw-bold text-center pt-5 register-title'>Iniciá sesión</h2>

<!--validacion-->
           <?php
            if (!empty($_SESSION['ok'])):
            ?>
                <div class="alert alert-info fade show" role="alert">
                <i class="bi bi-check-circle"></i>    
                <?= $_SESSION['ok'] ?>
                </div>
            <?php
            endif;
            ?>
            <?php
            if (!empty($_SESSION['error'])):
            ?>
                <div class="alert alert-danger fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                    <?= $_SESSION['error'] ?>
                </div>
            <?php
            endif;
            unset($_SESSION['error']);
            unset($_SESSION['ok']);
            ?>
<!---->


            <form action="features/login_feature.php" method="post">
                <div class='row justify-content-center'>
                  <div class='col-12 col-sm-8 col-md-7 col-lg-5 col-xl-4 justify-content-center form-container my-5'>
               
                <p class="my-3">Te damos la bienvenida a Props</p>

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
                                unset($_SESSION['errores']);
                                ?>
                    </div>
                </div>
        
       


                    <div class='col-12 d-grid gap-2 my-3 align-self-center text-center'>
                      <button type="submit" id="btn-register" class="btn">Iniciar sesión</button>  
                    </div>  

                    <hr class="w-100 clearfix" />
                    <div class="mb-3">
                        <small class='text-decoration-none text-center'><a href='index.php?seccion=registro' class='text-decoration-none'>¿Olvidaste tu contraseña?</a></small>
                    <br> 
                    <small class="mt-5">¿Todavía no tenés una cuenta? <a href="index.php?seccion=registro" class="fw-bold text-decoration-none">Registrate acá</a></small> 
                    </div>
                   
                  </div>
                    
                </div>
            </form>
        </div>
    </aside>