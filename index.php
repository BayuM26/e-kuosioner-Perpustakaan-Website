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
    <title>Dashboard</title>

    
    <style>
        footer{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
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
                <img src="img/Loader.gif" width="200">
                <p>MEMUAT....</p>
            </div>
            </div>
    <!-- end loading screen -->


    <!-- header  -->
        <div class="w3-bar w3-green w3-card w3-block">
            <a href="index.php" class="w3-bar-item w3-button">
                <img src="img/logo2.png" width="35px" height="35px">
                e-Kuesioner DISPERPUSIP KARAWANG</a>

            <a href="index.php" class="ms-sm-4 w3-bar-item w3-button w3-light-green"><i class="bi bi-house-door"></i> Home</a>
        </div>
    <!-- end header -->

    <!-- isi -->
        <div class="w3-container w3-center mt-sm-5">
            <a href="form-koesioner.php"><button class="btn btn-success">SURVEI TINGKAT KEPUASAN RESPONDEN</button></a>
        </div>

        <div class="w3-container w3-center mt-sm-5">
            <a href="from_angketPenelitianIBM.php"><button class="btn btn-success">ANKGET PENELITIAN INDEKS BACA MASYARAKAT</button></a>
        </div>
    <!-- end isi -->

    <!-- footer -->
    <footer>
		<div class="navbar navbar-nav w3-green w3-card w3-block">
			<p>Copyright &copy; 2021 DISPERPUSIP <p>
		</div>
	</footer>
    <!-- end footer -->
</body>
</html>