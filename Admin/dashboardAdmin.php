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
			<a href="dashboardAdmin.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-home"></i> HOME</a>
			
			<button class="w3-button w3-block w3-left-align" onclick="kuesionerFunc()"><i class="bi bi-clipboard"></i> Kuesioner <i class="fa fa-caret-down"></i></button>
			<div id="itemDropdownBook" class="w3-hide w3-small w3-white w3-card">
				<a href="Data_kuesioner.php" class="w3-bar-item w3-button bi bi-bookmark-plus"> Data Kuesioner</a>
				<a href="ExportFile.php" class="w3-bar-item w3-button bi bi-arrow-bar-up">  Export Data</a>
			</div>

			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-question-circle"></i> BANTUAN</a>
			<a href="#" class="w3-bar-item w3-button"><i class="bi bi-info-circle"></i> ABOUT</a>
		</div>		
    <!-- end sidebar -->


    <!-- isi -->
    <?php
        $konek = mysqli_connect("localhost", "root", "" , "ekuesioner");

         ?>

        <div class="w3-contrainer" style="margin-left: 180px; min-height: 600px;">
            
        
                    <div class="row ">
                        <div class="offset-lg-3 col-lg-6 mt-sm-5">
                            <div style="width:500px ">
                                <canvas id="IKM"></canvas>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mt-sm-5">
                            <div style="width:500px">
                                <canvas id="persentaseJawaban"></canvas>
                            </div>
                        </div> 
                        
                        <div class="col-lg-6 mt-sm-5">
                            <div style="width:500px">
                                <canvas id="total pertanyaan"></canvas>
                            </div>
                        </div>
                    </div>
               

                    <div class="row">
                        <div class="col-lg-6 mt-sm-5">
                            <div style="width:500px">
                                <canvas id="NNR"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-sm-5">
                            <div style="width:500px">
                                <canvas id="NNRtertimbang"></canvas>
                            </div>
                        </div>
                    </div>
                
        </div>

            <script>
                var ctx = document.getElementById("IKM");
                
                var persentaseJawaban = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Indek Kepuasan Masyarakat"],
                        datasets: [{
                                data: [
                                        <?php
                                             $IKM = mysqli_query($konek,"SELECT AVG(Q1) as rataaQ1,AVG(Q2) as rataaQ2,AVG(Q3) as rataaQ3,AVG(Q4) as rataaQ4,AVG(Q5) as rataaQ5
                                             ,AVG(Q6) as rataaQ6, AVG(Q7) as rataaQ7,AVG(Q8) as rataaQ8,AVG(Q9) as rataaQ9 FROM jawaban_responden");
                                             
                                             while ($ikm = mysqli_fetch_array($IKM)) 
                                             { 
                                                $H_IKM = ((((($ikm['rataaQ1'] * 0.111) + ($ikm['rataaQ2'] * 0.111)) + 
                                                            (($ikm['rataaQ3'] * 0.111) + ($ikm['rataaQ4'] * 0.111))) +
                                                            ((($ikm['rataaQ5'] * 0.111) + ($ikm['rataaQ6'] * 0.111)) +
                                                            (($ikm['rataaQ7'] * 0.111) + ($ikm['rataaQ8'] * 0.111)))) +
                                                            ($ikm['rataaQ9'] * 0.111)) ;

                                                $H_IKM = $H_IKM*25;

                                                echo '"' . $H_IKM . '",';
                                            } 
                                        ?>,
                                        
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)',
                                    '',
                                    'rgba(255, 99, 132, 0.2)',
                                    '',
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
                                    'rgba(255, 159, 64, 1)',
                                    '',
                                    'rgba(255, 99, 132, 1)',
                                    '',
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
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
                                 text: "PERSENTASE IKM RESPONDEN"
                            }
                    }
                });
            </script>
        
            <script>
                var ctx = document.getElementById("persentaseJawaban");
                
                var persentaseJawaban = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Tidak Sesuai", "Kurang Sesuai", "Sesuai" ,"Sangat Sesuai"],
                        datasets: [{
                                data: [
                                        <?php
                                             $jawabanTidakMemuaskan1 = mysqli_query($konek,"SELECT Q1 FROM jawaban_responden where Q1 = 1");
                                             $jawabanTidakMemuaskan2 = mysqli_query($konek,"SELECT Q2 FROM jawaban_responden where Q2 = 1");
                                             $jawabanTidakMemuaskan3 = mysqli_query($konek,"SELECT Q3 FROM jawaban_responden where Q3 = 1");
                                             $jawabanTidakMemuaskan4 = mysqli_query($konek,"SELECT Q4 FROM jawaban_responden where Q4 = 1");
                                             $jawabanTidakMemuaskan5 = mysqli_query($konek,"SELECT Q5 FROM jawaban_responden where Q5 = 1");
                                             $jawabanTidakMemuaskan6 = mysqli_query($konek,"SELECT Q6 FROM jawaban_responden where Q6 = 1");
                                             $jawabanTidakMemuaskan7 = mysqli_query($konek,"SELECT Q7 FROM jawaban_responden where Q7 = 1");
                                             $jawabanTidakMemuaskan8 = mysqli_query($konek,"SELECT Q8 FROM jawaban_responden where Q8 = 1");
                                             $jawabanTidakMemuaskan9 = mysqli_query($konek,"SELECT Q9 FROM jawaban_responden where Q9 = 1");
                                             
                                             $jumlah_TM = mysqli_num_rows($jawabanTidakMemuaskan1)+
                                             mysqli_num_rows($jawabanTidakMemuaskan2)+
                                             mysqli_num_rows($jawabanTidakMemuaskan3)+
                                             mysqli_num_rows($jawabanTidakMemuaskan4)+
                                             mysqli_num_rows($jawabanTidakMemuaskan5)+
                                             mysqli_num_rows($jawabanTidakMemuaskan6)+
                                             mysqli_num_rows($jawabanTidakMemuaskan7)+
                                             mysqli_num_rows($jawabanTidakMemuaskan8)+
                                             mysqli_num_rows($jawabanTidakMemuaskan9);
 
                                             echo $jumlah_TM;
                                        ?>,

                                        <?php
                                            $jawabanCukupMemuaskan1 = mysqli_query($konek,"SELECT Q1 FROM jawaban_responden WHERE Q1 = 2 ");
                                            $jawabanCukupMemuaskan2 = mysqli_query($konek,"SELECT Q2 FROM jawaban_responden WHERE Q2 = 2 ");
                                            $jawabanCukupMemuaskan3 = mysqli_query($konek,"SELECT Q3 FROM jawaban_responden WHERE Q3 = 2 ");
                                            $jawabanCukupMemuaskan4 = mysqli_query($konek,"SELECT Q4 FROM jawaban_responden WHERE Q4 = 2 ");
                                            $jawabanCukupMemuaskan5 = mysqli_query($konek,"SELECT Q5 FROM jawaban_responden WHERE Q5 = 2 ");
                                            $jawabanCukupMemuaskan6 = mysqli_query($konek,"SELECT Q6 FROM jawaban_responden WHERE Q6 = 2 ");
                                            $jawabanCukupMemuaskan7 = mysqli_query($konek,"SELECT Q7 FROM jawaban_responden WHERE Q7 = 2 ");
                                            $jawabanCukupMemuaskan8 = mysqli_query($konek,"SELECT Q8 FROM jawaban_responden WHERE Q8 = 2 ");
                                            $jawabanCukupMemuaskan9 = mysqli_query($konek,"SELECT Q9 FROM jawaban_responden WHERE Q9 = 2 ");
                                            
                                            $jumlah_CM = mysqli_num_rows($jawabanCukupMemuaskan1)+
                                            mysqli_num_rows($jawabanCukupMemuaskan2)+
                                            mysqli_num_rows($jawabanCukupMemuaskan3)+
                                            mysqli_num_rows($jawabanCukupMemuaskan4)+
                                            mysqli_num_rows($jawabanCukupMemuaskan5)+
                                            mysqli_num_rows($jawabanCukupMemuaskan6)+
                                            mysqli_num_rows($jawabanCukupMemuaskan7)+
                                            mysqli_num_rows($jawabanCukupMemuaskan8)+
                                            mysqli_num_rows($jawabanCukupMemuaskan9);

                                            echo $jumlah_CM;
                                        ?>,

                                        <?php
                                            $jawabanMemuaskan1 = mysqli_query($konek,"SELECT Q1 FROM jawaban_responden WHERE Q1 = 3 ");
                                            $jawabanMemuaskan2 = mysqli_query($konek,"SELECT Q2 FROM jawaban_responden WHERE Q2 = 3 ");
                                            $jawabanMemuaskan3 = mysqli_query($konek,"SELECT Q3 FROM jawaban_responden WHERE Q3 = 3 ");
                                            $jawabanMemuaskan4 = mysqli_query($konek,"SELECT Q4 FROM jawaban_responden WHERE Q4 = 3 ");
                                            $jawabanMemuaskan5 = mysqli_query($konek,"SELECT Q5 FROM jawaban_responden WHERE Q5 = 3 ");
                                            $jawabanMemuaskan6 = mysqli_query($konek,"SELECT Q6 FROM jawaban_responden WHERE Q6 = 3 ");
                                            $jawabanMemuaskan7 = mysqli_query($konek,"SELECT Q7 FROM jawaban_responden WHERE Q7 = 3 ");
                                            $jawabanMemuaskan8 = mysqli_query($konek,"SELECT Q8 FROM jawaban_responden WHERE Q8 = 3 ");
                                            $jawabanMemuaskan9 = mysqli_query($konek,"SELECT Q9 FROM jawaban_responden WHERE Q9 = 3 ");

                                            $jumlah_M = mysqli_num_rows($jawabanMemuaskan1)+
                                            mysqli_num_rows($jawabanMemuaskan2)+
                                            mysqli_num_rows($jawabanMemuaskan3)+
                                            mysqli_num_rows($jawabanMemuaskan4)+
                                            mysqli_num_rows($jawabanMemuaskan5)+
                                            mysqli_num_rows($jawabanMemuaskan6)+
                                            mysqli_num_rows($jawabanMemuaskan7)+
                                            mysqli_num_rows($jawabanMemuaskan8)+
                                            mysqli_num_rows($jawabanMemuaskan9);

                                            echo $jumlah_M;

                                        ?>,

                                        <?php
                                            $jawabanSangatMemuaskan1 = mysqli_query($konek,"SELECT Q1 FROM jawaban_responden WHERE Q1 = 4 ");
                                            $jawabanSangatMemuaskan2 = mysqli_query($konek,"SELECT Q2 FROM jawaban_responden WHERE Q2 = 4 ");
                                            $jawabanSangatMemuaskan3 = mysqli_query($konek,"SELECT Q3 FROM jawaban_responden WHERE Q3 = 4 ");
                                            $jawabanSangatMemuaskan4 = mysqli_query($konek,"SELECT Q4 FROM jawaban_responden WHERE Q4 = 4 ");
                                            $jawabanSangatMemuaskan5 = mysqli_query($konek,"SELECT Q5 FROM jawaban_responden WHERE Q5 = 4 ");
                                            $jawabanSangatMemuaskan6 = mysqli_query($konek,"SELECT Q6 FROM jawaban_responden WHERE Q6 = 4 ");
                                            $jawabanSangatMemuaskan7 = mysqli_query($konek,"SELECT Q7 FROM jawaban_responden WHERE Q7 = 4 ");
                                            $jawabanSangatMemuaskan8 = mysqli_query($konek,"SELECT Q8 FROM jawaban_responden WHERE Q8 = 4 ");
                                            $jawabanSangatMemuaskan9 = mysqli_query($konek,"SELECT Q9 FROM jawaban_responden WHERE Q9 = 4 ");

                                            $jumlah_SM = mysqli_num_rows($jawabanSangatMemuaskan1)+
                                            mysqli_num_rows($jawabanSangatMemuaskan2)+
                                            mysqli_num_rows($jawabanSangatMemuaskan3)+
                                            mysqli_num_rows($jawabanSangatMemuaskan4)+
                                            mysqli_num_rows($jawabanSangatMemuaskan5)+
                                            mysqli_num_rows($jawabanSangatMemuaskan6)+
                                            mysqli_num_rows($jawabanSangatMemuaskan7)+
                                            mysqli_num_rows($jawabanSangatMemuaskan8)+
                                            mysqli_num_rows($jawabanSangatMemuaskan9);

                                            echo $jumlah_SM;
                                        ?>
                                ],
                                backgroundColor: [
                                    'rgba(254, 32, 32, 0.5)',
                                    'rgba(255, 211, 0, 0.5)',
                                    'rgba(0, 23, 255, 0.5)',
                                    'rgba(4, 244, 4, 0.2)'

                                ],
                                borderColor: [
                                     'rgba(255,99,132,1)',
                                    'rgba(255, 211, 0, 1)',
                                    'rgba(0, 23, 255, 1)',
                                    'rgba(4, 244, 4, 1)'
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
                                 text: "PERSENTASE JAWABAN RESPONDEN"
                            }
                    }
                });
            </script>

            <script>
                var ctx = document.getElementById("total pertanyaan");
                
                var persentaseJawaban = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Q1", "", "Q2" ,"" ,"Q3" ,"" ,"Q4" ,"" ,"Q5", "" ,"Q6" ,"" ,"Q7" ,"", "Q8", "", "Q9"],
                        datasets: [{
                                data: [
                                        <?php
                                             $jumlahhQ1 = mysqli_query($konek,"SELECT SUM(Q1) as jumlahQ1 FROM jawaban_responden");
                                             while ($q1 = mysqli_fetch_array($jumlahhQ1)) { echo '"' . $q1['jumlahQ1'] . '",';} 
                                        ?>,

                                        <?php
                                             $jumlahhQ2 = mysqli_query($konek,"SELECT SUM(Q2) as jumlahQ2 FROM jawaban_responden");
                                             while ($q2 = mysqli_fetch_array($jumlahhQ2)) { echo '"' . $q2['jumlahQ2'] . '",';}  
                                        ?>,

                                        <?php
                                             $jumlahhQ3 = mysqli_query($konek,"SELECT SUM(Q3) as jumlahQ3 FROM jawaban_responden");
                                             while ($q3 = mysqli_fetch_array($jumlahhQ3)) { echo '"' . $q3['jumlahQ3'] . '",';}
                                        ?>,

                                        <?php
                                             $jumlahhQ4 = mysqli_query($konek,"SELECT SUM(Q4) as jumlahQ4 FROM jawaban_responden");
                                             while ($q4 = mysqli_fetch_array($jumlahhQ4)) { echo '"' . $q4['jumlahQ4'] . '",';}  
                                        ?>,

                                        <?php
                                             $jumlahhQ5 = mysqli_query($konek,"SELECT SUM(Q5) as jumlahQ5 FROM jawaban_responden");
                                             while ($q5 = mysqli_fetch_array($jumlahhQ5)) { echo '"' . $q5['jumlahQ5'] . '",';}  
                                        ?>,

                                        <?php
                                             $jumlahhQ6 = mysqli_query($konek,"SELECT SUM(Q6) as jumlahQ6 FROM jawaban_responden");
                                             while ($q6 = mysqli_fetch_array($jumlahhQ6)) { echo '"' . $q6['jumlahQ6'] . '",';}  
                                        ?>,

                                        <?php
                                             $jumlahhQ7 = mysqli_query($konek,"SELECT SUM(Q7) as jumlahQ7 FROM jawaban_responden");
                                             while ($q7 = mysqli_fetch_array($jumlahhQ7)) { echo '"' . $q7['jumlahQ7'] . '",';} 
                                        ?>,

                                        <?php
                                             $jumlahhQ8 = mysqli_query($konek,"SELECT SUM(Q8) as jumlahQ8 FROM jawaban_responden");
                                             while ($q8 = mysqli_fetch_array($jumlahhQ8)) { echo '"' . $q8['jumlahQ8'] . '",';} 
                                        ?>,

                                        <?php
                                             $jumlahhQ9 = mysqli_query($konek,"SELECT SUM(Q9) as jumlahQ9 FROM jawaban_responden");
                                             while ($q9 = mysqli_fetch_array($jumlahhQ9)) { echo '"' . $q9['jumlahQ9'] . '",';}  
                                        ?>
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)',
                                    '',
                                    'rgba(255, 99, 132, 0.2)',
                                    '',
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
                                    'rgba(255, 159, 64, 1)',
                                    '',
                                    'rgba(255, 99, 132, 1)',
                                    '',
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
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
                                 text: "PERSENTASE TOTAL JAWABAN RESPONDEN"
                            }
                    }
                });
            </script>

            <script>
                var ctx = document.getElementById("NNR");
                
                var persentaseJawaban = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Q1", "", "Q2" ,"" ,"Q3" ,"" ,"Q4" ,"" ,"Q5", "" ,"Q6" ,"" ,"Q7" ,"", "Q8", "", "Q9"],
                        datasets: [{
                                data: [
                                        <?php
                                             $rataQ1 = mysqli_query($konek,"SELECT AVG(Q1) as rataaQ1 FROM jawaban_responden");
                                             while ($q1 = mysqli_fetch_array($rataQ1)) { echo '"' . $q1['rataaQ1'] . '",';} 
                                        ?>,

                                        <?php
                                             $rataQ2 = mysqli_query($konek,"SELECT AVG(Q2) as rataaQ2 FROM jawaban_responden");
                                             while ($q2 = mysqli_fetch_array($rataQ2)) { echo '"' . $q2['rataaQ2'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ3 = mysqli_query($konek,"SELECT AVG(Q3) as rataaQ3 FROM jawaban_responden");
                                             while ($q3 = mysqli_fetch_array($rataQ3)) { echo '"' . $q3['rataaQ3'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ4 = mysqli_query($konek,"SELECT AVG(Q4) as rataaQ4 FROM jawaban_responden");
                                             while ($q4 = mysqli_fetch_array($rataQ4)) { echo '"' . $q4['rataaQ4'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ5 = mysqli_query($konek,"SELECT AVG(Q5) as rataaQ5 FROM jawaban_responden");
                                             while ($q5 = mysqli_fetch_array($rataQ5)) { echo '"' . $q5['rataaQ5'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ6 = mysqli_query($konek,"SELECT AVG(Q6) as rataaQ6 FROM jawaban_responden");
                                             while ($q6 = mysqli_fetch_array($rataQ6)) { echo '"' . $q6['rataaQ6'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ7 = mysqli_query($konek,"SELECT AVG(Q7) as rataaQ7 FROM jawaban_responden");
                                             while ($q7 = mysqli_fetch_array($rataQ7)) { echo '"' . $q7['rataaQ7'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ8 = mysqli_query($konek,"SELECT AVG(Q8) as rataaQ8 FROM jawaban_responden");
                                             while ($q8 = mysqli_fetch_array($rataQ8)) { echo '"' . $q8['rataaQ8'] . '",';} 
                                        ?>,
                                        <?php
                                             $rataQ9 = mysqli_query($konek,"SELECT AVG(Q9) as rataaQ9 FROM jawaban_responden");
                                             while ($q9 = mysqli_fetch_array($rataQ9)) { echo '"' . $q9['rataaQ9'] . '",';} 
                                        ?>,
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)',
                                    '',
                                    'rgba(255, 99, 132, 0.2)',
                                    '',
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
                                    'rgba(255, 159, 64, 1)',
                                    '',
                                    'rgba(255, 99, 132, 1)',
                                    '',
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
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
                                 text: "PERSENTASE NNR RESPONDEN"
                            }
                    }
                });
            </script>

            <script>
                var ctx = document.getElementById("NNRtertimbang");
                
                var persentaseJawaban = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Q1", "", "Q2" ,"" ,"Q3" ,"" ,"Q4" ,"" ,"Q5", "" ,"Q6" ,"" ,"Q7" ,"", "Q8", "", "Q9"],
                        datasets: [{
                                data: [
                                        <?php
                                             $rataQ1 = mysqli_query($konek,"SELECT AVG(Q1) as rataaQ1 FROM jawaban_responden");
                                             
                                             while ($q1 = mysqli_fetch_array($rataQ1)) 
                                             { 
                                                $NNRterQ1 = $q1['rataaQ1'] * 0.111;
                                                echo '"' . $NNRterQ1 . '",';
                                            } 
                                        ?>,

                                        <?php
                                             $rataQ2 = mysqli_query($konek,"SELECT AVG(Q2) as rataaQ2 FROM jawaban_responden");
                                             while ($q2 = mysqli_fetch_array($rataQ2)) 
                                             { 
                                                $NNRterQ2 = $q2['rataaQ2'] * 0.111;
                                                echo '"' . $NNRterQ2 . '",';
                                            } 
                                        ?>,
                                        <?php
                                             $rataQ3 = mysqli_query($konek,"SELECT AVG(Q3) as rataaQ3 FROM jawaban_responden");
                                             while ($q3 = mysqli_fetch_array($rataQ3)) 
                                             { 
                                                $NNRterQ3 = $q3['rataaQ3'] * 0.111;
                                                echo '"' . $NNRterQ3 . '",';
                                                } 
                                        ?>,
                                        <?php
                                             $rataQ4 = mysqli_query($konek,"SELECT AVG(Q4) as rataaQ4 FROM jawaban_responden");
                                             while ($q4 = mysqli_fetch_array($rataQ4)) 
                                             { 
                                                $NNRterQ4 = $q4['rataaQ4'] * 0.111;
                                                echo '"' . $NNRterQ4 . '",';
                                                } 
                                        ?>,
                                        <?php
                                             $rataQ5 = mysqli_query($konek,"SELECT AVG(Q5) as rataaQ5 FROM jawaban_responden");
                                             while ($q5 = mysqli_fetch_array($rataQ5)) 
                                             { 
                                                $NNRterQ5 = $q5['rataaQ5'] * 0.111;
                                                echo '"' . $NNRterQ5 . '",';
                                                } 
                                        ?>,
                                        <?php
                                             $rataQ6 = mysqli_query($konek,"SELECT AVG(Q6) as rataaQ6 FROM jawaban_responden");
                                             while ($q6 = mysqli_fetch_array($rataQ6)) 
                                             { 
                                                $NNRterQ6 = $q6['rataaQ6'] * 0.111;
                                                echo '"' . $NNRterQ6 . '",';
                                                } 
                                        ?>,
                                        <?php
                                             $rataQ7 = mysqli_query($konek,"SELECT AVG(Q7) as rataaQ7 FROM jawaban_responden");
                                             while ($q7 = mysqli_fetch_array($rataQ7)) 
                                             { 
                                                $NNRterQ7 = $q7['rataaQ7'] * 0.111;
                                                echo '"' . $NNRterQ7 . '",';
                                            } 
                                        ?>,
                                        <?php
                                             $rataQ8 = mysqli_query($konek,"SELECT AVG(Q8) as rataaQ8 FROM jawaban_responden");
                                             while ($q8 = mysqli_fetch_array($rataQ8)) 
                                             { 
                                                $NNRterQ8 = $q8['rataaQ8'] * 0.111;
                                                echo '"' . $NNRterQ8 . '",';
                                            } 
                                        ?>,
                                        <?php
                                             $rataQ9 = mysqli_query($konek,"SELECT AVG(Q9) as rataaQ9 FROM jawaban_responden");
                                             while ($q9 = mysqli_fetch_array($rataQ9)) 
                                             { 
                                                $NNRterQ9 = $q9['rataaQ9'] * 0.111;
                                                echo '"' . $NNRterQ9 . '",';
                                            } 
                                        ?>,

                                        
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)',
                                    '',
                                    'rgba(255, 99, 132, 0.2)',
                                    '',
                                    'rgba(54, 162, 235, 0.2)',
                                    '',
                                    'rgba(255, 206, 86, 0.2)',
                                    '',
                                    'rgba(75, 192, 192, 0.2)',
                                    '',
                                    'rgba(153, 102, 255, 0.2)',
                                    '',
                                    'rgba(255, 159, 64, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
                                    'rgba(255, 159, 64, 1)',
                                    '',
                                    'rgba(255, 99, 132, 1)',
                                    '',
                                    'rgba(54, 162, 235, 1)',
                                    '',
                                    'rgba(255, 206, 86, 1)',
                                    '',
                                    'rgba(75, 192, 192, 1)',
                                    '',
                                    'rgba(153, 102, 255, 1)',
                                    '',
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
                                 text: "PERSENTASE NNR TERTIMBANG RESPONDEN"
                            }
                    }
                });
            </script>

            
        
    <!-- end isi -->


    <!-- footer -->
		<div class="w3-bar w3-green w3-card w3-block">
			<p class="w3-center">Copyright &copy; 2022 BAYU MAULANA <p>
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