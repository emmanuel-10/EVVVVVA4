<?php


session_start();

  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>



    <div class="cajauser" >


       


        <div class="caja1">
            
                <h4>Iniciar Sesion</h4>
                
                <h3>Usuario</h3>


                <br>
            
            <p class="red-text ">
            <?php

            
            if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            }
            ?>
            </p>
                

            

            <form action="controllers/LoginUser.php" method="POST">
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="rut" type="text" name="rut">
                        <label for="rut">Rut</label>
                    </div>
                
                    <div class="input-field">
                        <i class="material-icons prefix">fingerprint</i>
                        <input id="clave" type="password" name="clave">
                        <label for="clave">Clave</label>
                    </div>
                    <br> <br>
                    <button class="btn grey waves-effect waves-light"><i class="material-icons left">person</i>Iniciar Sesion</button>
                    <br> <br>
                </form>

            

                <br>
            
              
               <a href="index.php"><i class="material-icons center">reply</i><br> Volver al menu</a>


        </div>



        <div class="caja2">

            <h1>Optica 2020</h1>

            <hr>

            <div class="img">
                    <img src="data:image/jpeg;base64,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">
            </div>

            <div class="redes">
                    <h5>Siguenos en nuestras redes sociales</h5>
                    <hr>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook-f"></i>
            </div>


        </div>

        
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://kit.fontawesome.com/cfc5ab0442.js" crossorigin="anonymous"></script>   
</body>
</html>