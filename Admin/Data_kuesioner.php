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
    <title>Data Kuesioner</title>

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
				<a href="Data_kuesioner.php" class="w3-bar-item w3-button bi bi-bookmark-plus w3-light-green"> Data Kuesioner</a>
				<a href="ExportFile.php" class="w3-bar-item w3-button bi bi bi-arrow-bar-up"> Export Data</a>
			</div>

			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-question-circle"></i> BANTUAN</a>
			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-info-circle"></i> ABOUT</a>
		</div>		
    <!-- end sidebar -->

    <!-- isi -->
    <?php
        $konek = mysqli_connect("localhost", "root", "" , "ekuesioner");

         ?>

        <div class="w3-contrainer " style="margin-left: 180px; min-height: 600px;">

        
            <div class="row">
                
                <div class="col-lg-6 mt-sm-5">
                    <div style="width:500px">
                        <canvas id="persentaseJawabanBerdasarkanJk"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mt-sm-5">
                    <div style="width:500px">
                        <canvas id="persentaseJawabanBerdasarkanpekerjaan"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-6 mt-sm-5">
                    <div style="width:500px">
                        <canvas id="persentaseJawabanBerdasarkanpendidikan"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mt-sm-5">
                    <div style="width:500px">
                        <canvas id="persentaseJawabanBerdasarkanusia"></canvas>
                    </div>
                </div>
            </div>


        </div>
            <!-- akumulasi berdsarkan jenis kelamin -->
                <script>
                    var ctx = document.getElementById("persentaseJawabanBerdasarkanJk");
                    
                    var persentasejk = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["LAKI LAKI", "PEREMPUAN"],
                            datasets: [{
                                    data: [
                                            <?php
                                                $pria = mysqli_query($konek,"SELECT jenis_k FROM data_responden where jenis_k = 'L'");
                                                echo mysqli_num_rows($pria);
                                            ?>,

                                            <?php
                                                $wanita = mysqli_query($konek,"SELECT jenis_k FROM data_responden where jenis_k = 'P'");
                                                echo mysqli_num_rows($wanita);
                                            ?>
                                    ],
                                    backgroundColor: [
                                        'rgba(0, 0, 128, 0.5)',
                                        'rgba(152, 251, 152, 0.5)'

                                    ],
                                    borderColor: [
                                        'rgba(0, 0, 128, 1)',
                                        'rgba(152, 251, 152, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                            
                                        }
                                    }]
                            },
                            legend: {display: false},
                            title: {
                                display: true,
                                 text: "PERBANDINGAN JUMLAH RESPONDEN BERDASARKAN GENDER"
                            }
                        }
                    });
                </script>
            <!-- end akumulasi berdasarkan jenis kelamin -->

            <!-- akumulasi berdasarkan pekerjaan -->
                <script>
                        var ctx = document.getElementById("persentaseJawabanBerdasarkanpekerjaan");
                        
                        var persentaseJawabanPekerjaan = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["PNS", "TNI", "POLRI", "P.SWASTA", "WIRASWSTA", "P / MAHASISWA", "LAINNYA"],
                                datasets: [{
                                        data: [
                                                <?php
                                                    $pns = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'PNS'");
                                                    echo mysqli_num_rows($pns);
                                                ?>,

                                                <?php
                                                    $TNI = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'TNI'");
                                                    echo mysqli_num_rows($TNI);
                                                ?>,

                                                <?php
                                                    $POLRI = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'POLRI'");
                                                    echo mysqli_num_rows($POLRI);
                                                ?>,

                                                <?php
                                                    $PEGAWAI_SWASTA = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'PEGAWAI SWASTA'");
                                                    echo mysqli_num_rows($PEGAWAI_SWASTA);
                                                ?>,

                                                <?php
                                                    $WIRASWSTA = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'WIRASWSTA'");
                                                    echo mysqli_num_rows($WIRASWSTA);
                                                ?>,

                                                <?php
                                                    $PELAJAR = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'PELAJAR/MAHASISWA'");
                                                    echo mysqli_num_rows($PELAJAR);
                                                ?>,

                                                <?php
                                                    $LAINNYA = mysqli_query($konek,"SELECT pekerjaan FROM data_responden where pekerjaan = 'LAINNYA'");
                                                    echo mysqli_num_rows($LAINNYA);
                                                ?>,

                                                
                                        ],
                                        backgroundColor: [
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)',
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                },
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "PERBANDINGAN JUMLAH RESPONDEN BERDASARKAN PEKERJAAN"
                            }
                            }
                        });
                </script>
            <!-- end akumulasi bedasarkan pekerjaan -->

            <!-- akumulasi berdasarkan pendidikan -->
                <script>
                        var ctx = document.getElementById("persentaseJawabanBerdasarkanpendidikan");
                        
                        var persentaseJawabanPekerjaan = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["SD", "SLTP", "SLTA", "D1", "D3", "D4", "S1", "S2", "S3"],
                                datasets: [{
                                        data: [
                                                <?php
                                                    $SekolahDasar = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'SekolahDasar'");
                                                    echo mysqli_num_rows($SekolahDasar);
                                                ?>,

                                                <?php
                                                    $SLTP = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'SLTP'");
                                                    echo mysqli_num_rows($SLTP);
                                                ?>,

                                                <?php
                                                    $SLTA = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'SLTA'");
                                                    echo mysqli_num_rows($SLTA);
                                                ?>,

                                                <?php
                                                    $D1 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'D1'");
                                                    echo mysqli_num_rows($D1);
                                                ?>,

                                                <?php
                                                    $D3 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'D3'");
                                                    echo mysqli_num_rows($D3);
                                                ?>,

                                                <?php
                                                    $D4 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'D4'");
                                                    echo mysqli_num_rows($D4);
                                                ?>,

                                                <?php
                                                    $S1 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'S1'");
                                                    echo mysqli_num_rows($S1);
                                                ?>,

                                                <?php
                                                    $S2 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'S2'");
                                                    echo mysqli_num_rows($S2);
                                                ?>,

                                                <?php
                                                    $S3 = mysqli_query($konek,"SELECT pendidikan FROM data_responden where pendidikan = 'S3'");
                                                    echo mysqli_num_rows($S3);
                                                ?>

                                                
                                        ],
                                        backgroundColor: [
                                            'rgba(54, 162, 235, 0.5)',
                                            'rgba(255, 206, 86, 0.5)',
                                            'rgba(75, 192, 192, 0.5)',
                                            'rgba(153, 102, 255, 0.5)',
                                            'rgba(255, 159, 64, 0.5)',
                                            'rgba(255, 99, 132, 0.5)',
                                            'rgba(54, 162, 235, 0.5)',
                                            'rgba(255, 206, 86, 0.5)',
                                            'rgba(75, 192, 192, 0.5)',
                                            'rgba(153, 102, 255, 0.5)',
                                            'rgba(255, 159, 64, 0.5)'

                                        ],
                                        borderColor: [
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)',
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                },
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "PERBANDINGAN JUMLAH RESPONDEN BERDASARKAN PENDIDIKAN"
                            }
                            }
                        });
                </script>
            <!-- end akumulasi berdasarkan pendidikan -->

            <!-- akumulasi berdsarkan usia -->
                <script>
                    var ctx = document.getElementById("persentaseJawabanBerdasarkanusia");
                    
                    var persentasejk = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["2-10TH", "11-19TH", "20-60TH", "60Keatas"],
                            datasets: [{
                                    data: [
                                            <?php
                                                $anakAnak = mysqli_query($konek,"SELECT umur FROM data_responden where umur = '2-10th'");
                                                echo mysqli_num_rows($anakAnak);
                                            ?>,

                                            <?php
                                                $Remaja = mysqli_query($konek,"SELECT umur FROM data_responden where umur = '11-19th'");
                                                echo mysqli_num_rows($Remaja);
                                            ?>,

                                            <?php
                                                $dewasa = mysqli_query($konek,"SELECT umur FROM data_responden where umur = '20-60th'");
                                                echo mysqli_num_rows($dewasa);
                                            ?>,

                                            <?php
                                                $lansia = mysqli_query($konek,"SELECT umur FROM data_responden where umur = '60keatas'");
                                                echo mysqli_num_rows($lansia);
                                            ?>,
                                    ],
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'

                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)',
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                            
                                        }
                                    }]
                            },
                            legend: {display: false},
                            title: {
                                display: true,
                                 text: "PERBANDINGAN JUMLAH RESPONDEN BERDASARKAN USIA"
                            }
                        }
                    });
                </script>
            <!-- end akumulasi berdasarkan usia -->
        
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