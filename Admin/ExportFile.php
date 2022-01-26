<?php
session_start();
?>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <title>Export Data</title>

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

            <div class="preloader">
                <div class="loading">
                    <img src="../img/Loader.gif" width="200">
                    <p>MEMUAT....</p>
                </div>
            </div>
    <!-- end loading screen -->
    
    <!-- navigasi -->
    <div class="w3-bar w3-green w3-card w3-block">
        <a href="dashboardAdmin.php" class="w3-bar-item w3-button">
            <img src="../img/logo2.png" width="35px" height="35px">
            e-Kuesioner</a>
    </div>
    <!-- end navigasi -->

    <!-- sidebar -->
		<div class="w3-sidebar w3-bar-block w3-green w3-card" style="width: 140px; padding-top: 30px; height:100%;">
			<a href="dashboardAdmin.php" class="w3-bar-item w3-button "><i class="fa fa-home"></i> HOME</a>
			
			<button class="w3-button w3-block w3-left-align w3-light-grey" onclick="kuesionerFunc()"><i class="bi bi-clipboard"></i> Kuesioner <i class="fa fa-caret-down"></i></button>
			<div id="itemDropdownBook" class="w3-hide w3-small w3-white w3-card">
				<a href="Data_kuesioner.php" class="w3-bar-item w3-button bi bi-bookmark-plus"> Data Kuesioner</a>
				<a href="ExportFile.php" class="w3-bar-item w3-button bi bi-arrow-bar-up w3-light-green"> Export Data</a>
			</div>

			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-question-circle"></i> BANTUAN</a>
			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-info-circle"></i> ABOUT</a>
		</div>		
    <!-- end sidebar -->


    <!-- isi -->
    </div class="row">
        <div class="col-sm-11 ms-sm-5 ">
            <div class="w3-contrainer mt-sm-4" style="margin-left: 160px; min-height: 600px;">
                <h2 class="w3-center">TABULASI DATA KUESIONER KEPUASAN MASYARAKAT</h2>

                    <a href="../Export/ExportFile_Adapter.php">    
                        <button type="button" class="btn btn-outline-success w3-right mb-sm-4 mt-sm-5" >Export <img src="../img/export.png" width="30px" ></button>
                    </a>    
                
                    <table class="w3-table-all w3-hoverable mt-sm-4 w3-card">
                        <thead>
                            <tr class="w3-light-grey">
                                <th scope="col">NO</th>
                                <th scope="col">Q1</th>
                                <th scope="col">Q2</th>
                                <th scope="col">Q3</th>
                                <th scope="col">Q4</th>
                                <th scope="col">Q5</th>
                                <th scope="col">Q6</th>
                                <th scope="col">Q7</th>
                                <th scope="col">Q8</th>
                                <th scope="col">Q9</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>

                        <tbody>
                           
                            <?php
                           
                                require_once '../koesioner_adapter.php';

                                    $query = "SELECT * FROM jawaban_responden ORDER BY id_jawaban_responden ASC";
                                    $kuesioner->view_jawaban($query);
   
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- end isi -->


    <!-- footer -->
		<div class="w3-bar w3-green w3-card w3-block">
			<p class="w3-center">Copyright &copy; 2022 BAYU MAULANA<p>
		</div>
    <!-- end footer -->

    <script>
		// dropdown buku animation
		function kuesionerFunc(){
			var kuesioner = document.getElementById("itemDropdownBook");
			
			
			if (kuesioner.className.indexOf("w3-show") == -1)
			{ 
				kuesioner.className += " w3-show";
				kuesioner.previousElementSibling.className += " w3-light-blue";
			}

			else
			{
				kuesioner.className = kuesioner.className.replace(" w3-show", "");
				kuesioner.previousElementSibling.className = 
				kuesioner.previousElementSibling.className.replace(" w3-light-blue", "");
			}
		}
		// end dropdown buku animation
	</script>

    
</body>
</html>