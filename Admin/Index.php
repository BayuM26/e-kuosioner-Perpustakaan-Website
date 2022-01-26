<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    <title>LOGIN</title>

    <style>
        body{
            /* background-image: url('../img/bg.png'); */
            background-color: #000;
            background-repeat:no-repeat;
            background-size: cover;
            background-attachment: fixed;
        } 
        
        input{
            background: transparent;
            border: none;
            border-bottom: 1px solid white;
            color: white;
        }

        i{
            color: white;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }
        .preloader .loading {
            position: absolute;
            text-align: center;
            left: 50%;
            top: 30%;
            transform: translate(-50%,-18%);
            font: 14px arial;
        }

    </style>
</head>
<body>
    <!-- loading screen -->
    <script>
            $(document).ready(function(){
            $(".preloader").fadeOut();
            })
            </script>

        </head><body>
            <div class="preloader">
            <div class="loading">
                <img src="../img/Loader.gif" width="200">
                <p>MEMUAT....</p>
            </div>
            </div>
    <!-- end loading screen -->
    
    <?php
        require_once '../koesioner_adapter.php';

        if(isset($_POST['btn_login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == '' || $password == '')
            {
                echo'
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol> 
                </svg> 
    
                <div class="alert alert-warning d-flex alert-dismissible align-items-center w3-animate-opacity" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        MOHON UNTUK MENGISI DATA SECARA LENGKAP!!!
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            
            else
            {
                $login->validasilogin($username,$password);
            }
        }

    ?>

    <form action="" method="post">
        <div class="w3-container ">
            <div class="w3-display-middle">

                <div class="w3-center mb-sm-5 "> 
                    <img src="../img/logo2.png" width="105" height="105" srcset="">
                    <h3 class="w3-cursive" style="color: rgba(248, 248, 248, 0.555)"> ADMIN </h3>
                </div>

                <div class="input-group mb-sm-3 ">
                    <span class="input-group-text bg-transparent border-top-0 border-start-0 border-end-0" id="username"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class=" " name="username" placeholder="Username" autofocus aria-describedby="username">
                </div>

                <div class="input-group mb-sm-4">
                    <span class="input-group-text bg-transparent border-top-0 border-start-0 border-end-0" id="password"><i class="bi bi-shield-lock-fill"></i></i></span>
                    <input type="password" class="" name="password" placeholder="Password" aria-describedby="password">
                </div>

                <button type="submit" name="btn_login" class="btn btn-success d-grid col-12 mx-auto" >LOGIN</button>
            </div>
        </div>
    </form>
</body>
</html>