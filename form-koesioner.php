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
    <title>From Kuesioner</title>

    <style>
        	footer{
			position: fixed;
			bottom: 0;
			left: 0;
			width: 100%;
			text-align: center;
		}

        .width{
            height: 2500px;
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

            <a href="index.php" class="ms-sm-4 w3-bar-item w3-button"><i class="bi bi-house-door"></i> Home</a>
        </div>
    <!-- end header -->
    
    <?php
    require_once 'koesioner_adapter.php';

        if(isset($_POST['btn_input'])){
            $Vumur = isset($_POST['umur']);
            $Vjk = isset($_POST['jk']);
            $Vpendidikan = isset($_POST['pendidikan']);
            $Vpekerjaan = isset($_POST['pekerjaan']);
            
          

            // alert jika data kosong
            if(($Vumur == '' || $Vjk == '') || ($Vpendidikan == '' || $Vpekerjaan == ''))
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
            // end alert jika data kosong
            
            else
            {
                $umur = $_POST['umur'];
                $jk = $_POST['jk'];
                $pendidikan = $_POST['pendidikan'];
                $pekerjaan = $_POST['pekerjaan'];
                $p1 = $_POST['pertanyaan1'];
                $p2 = $_POST['pertanyaan2'];
                $p3 = $_POST['pertanyaan3'];
                $p4 = $_POST['pertanyaan4'];
                $p5 = $_POST['pertanyaan5'];
                $p6 = $_POST['pertanyaan6'];
                $p7 = $_POST['pertanyaan7'];
                $p8 = $_POST['pertanyaan8'];
                $p9 = $_POST['pertanyaan9'];
                
                if($kuesioner->Insertkuesioner($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9)){
                    $kuesioner->InsertDataResponden($umur, $jk, $pendidikan, $pekerjaan);

                    echo'
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                  
                    <div class="alert alert-success d-flex alert-dismissible align-items-center w3-animate-opacity" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            TERIMAKSIH TELAH MENGISI KUESIONER <i class="bi bi-emoji-smile"></i>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                
               
            }
        }
    ?>
    <!-- isi -->
    <form action="" method="post">
        <div class="w3-container mt-sm-5 width">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
            
                    <div class="form-group">

                        <h2 class="w3-center">Data Masyarakat (Responden)</h2>

                        <div class="row mt-sm-4">
                            <div class="col-sm-6">
                                <select class="form-select" name="umur">
                                    <option selected disabled>Usia</option>
                                    <option value="2-10th">2-10 TAHUN</option>
                                    <option value="11-19th">11-19 TAHUN</option>
                                    <option value="20-60th">20-60 TAHUN</option>
                                    <option value="60Keatas">60 TAHUN KEATAS</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <select class="form-select" name="jk">
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option value="L">PRIA</option>
                                    <option value="P">WANITA</option>
                                  </select>
                            </div>
                        </div>

                        <select class="form-select mt-sm-4" name="pendidikan">
                            <option selected disabled>Pendidikan Terakhir</option>
                            <option value="SekolahDasar">SD Kebawah</option>
                            <option value="SLTP">SLTP (SMP)</option>
                            <option value="SLTA">SLTA (SMA/SMK)</option>
                            <option value="D1">D1</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>

                          
                        <select class="form-select mt-sm-4" name="pekerjaan">
                            <option selected disabled>Pekerjaan Saat ini</option>
                            <option value="PNS">Pegawai Negri Sipil (PNS)</option>
                            <option value="TNI">TNI</option>
                            <option value="POLRI">POLRI</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Wiraswasta">Wiraswasta/Usahawan</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="lainnya">Lainnya...</option>
                          </select>

                         
                    </div>

                    <!-- keosioner -->
                    <div class="form-group mt-sm-5">
                        <h2 class="w3-center">KUESIONER</h2>

                        <div>
                            <!-- Pertanyaan 1 -->
                            <p class="mt-sm-5">
                                1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dangan jenis Pelayanannya?
                            </p>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan1" type="radio" id="p1" value="1" checked>
                                <label class="form-check-label" for="p1">
                                    Tidak sesuai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan1" type="radio" id="p1.2" value="2">
                                <label class="form-check-label" for="p1.2">
                                    Kurang sesuai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan1" type="radio" id="p1.3" value="3">
                                <label class="form-check-label" for="p1.3">
                                   Sesuai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan1" type="radio" id="p1.4" value="4" >
                                <label class="form-check-label" for="p1.4">
                                    Sangat sesuai
                                </label>
                            </div>
                            <!-- end pertanyaan 1 -->

                            <!-- Pertanyaan 2 -->
                                <p class="mt-sm-5">
                                    2. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di perpustakaan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2" value="1" checked>
                                    <label class="form-check-label" for="p2">
                                        Tidak mudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.2" value="2">
                                    <label class="form-check-label" for="p2.2">
                                        Kurang mudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.3" value="3">
                                    <label class="form-check-label" for="p2.3">
                                    Mudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.4" value="4" >
                                    <label class="form-check-label" for="p2.4">
                                        Sangat mudah
                                    </label>
                                </div>
                            <!-- end pertanyaan 2 -->

                            <!-- Pertanyaan 3 -->
                                <p class="mt-sm-5">
                                    3. Bagaimana pendapat Saudara tentang kecepatan pelayanan Perpustakaan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3" value="1" checked>
                                    <label class="form-check-label" for="p3">
                                        Tidak cepat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3.2" value="2">
                                    <label class="form-check-label" for="p3.2">
                                        Kurang cepat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3.3" value="3">
                                    <label class="form-check-label" for="p3.3">
                                    Cepat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3.4" value="4" >
                                    <label class="form-check-label" for="p3.4">
                                        Sangat cepat
                                    </label>
                                </div>
                            <!-- end pertanyaan 3 -->

                            <!-- Pertanyaan 4 -->
                                <p class="mt-sm-5">
                                    4. Bagaimana pendapat Saudara tentang kewajawan biaya/tarif dalam pelayanan denda?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id=" p4" value="1" checked>
                                    <label class="form-check-label" for=" p4">
                                        Tidak mahal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id="p4.2" value="2">
                                    <label class="form-check-label" for="p4.2">
                                        Kurang mahal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id="p4.3" value="3">
                                    <label class="form-check-label" for="p4.3">
                                    Murah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id="p4.4" value="4" >
                                    <label class="form-check-label" for="p4.4">
                                        Gratis
                                    </label>
                                </div>
                            <!-- end pertanyaan 4 -->

                            <!-- Pertanyaan 5 -->
                                <p class="mt-sm-5">
                                    5. Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum 
                                    dalam standar pelayanan dengan hasil yang diberikan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5" value="1" checked>
                                    <label class="form-check-label" for="p5">
                                        Tidak sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5.2" value="2">
                                    <label class="form-check-label" for="p5.2">
                                        Kurang sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5.3" value="3">
                                    <label class="form-check-label" for="p5.3">
                                    Sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5.4" value="4">
                                    <label class="form-check-label" for="p5.4">
                                        Sangat sesuai
                                    </label>
                                </div>
                            <!-- end pertanyaan 5 -->

                            <!-- Pertanyaan 6 -->
                                <p class="mt-sm-5">
                                    6. Bagaimana pendapat Sadara tentang kemampuan petugas dalam memberikan pelayanan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6" value="1" checked>
                                    <label class="form-check-label" for="p6">
                                        Tidak kompeten
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.2" value="2">
                                    <label class="form-check-label" for="p6.2">
                                        Kurang kompeten
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.3" value="3">
                                    <label class="form-check-label" for="p6.3">
                                        Kompeten
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.4" value="4" >
                                    <label class="form-check-label" for="p6.4">
                                        Sangat kompeten
                                    </label>
                                </div>
                            <!-- end pertanyaan 6 -->

                            <!-- Pertanyaan 7 -->
                                <p class="mt-sm-5">
                                    7. Bagaimana pendapat saudara prilaku petugas dalam pelayanan terkait 
                                    kesopanan dan keramahan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan7" type="radio" id="p7" value="1"  checked>
                                    <label class="form-check-label" for="p7">
                                        Tidak sopan dan ramah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan7" type="radio" id="p7.2" value="2">
                                    <label class="form-check-label" for="p7.2">
                                        Kurang sopan dan ramah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan7" type="radio" id="p7.3" value="3">
                                    <label class="form-check-label" for="p7.3">
                                        Sopan dan ramah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan7" type="radio" id="p7.4" value="4">
                                    <label class="form-check-label" for="p7.4">
                                        Sangat sopan dan ramah
                                    </label>
                                </div>
                            <!-- end pertanyaan 7 -->

                            <!-- Pertanyaan 8 -->
                                <p class="mt-sm-5">
                                    8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan8" type="radio" id="p8" value="1" checked>
                                    <label class="form-check-label" for="p8">
                                        Buruk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan8" type="radio" id="p8.2" value="2">
                                    <label class="form-check-label" for="p8.2">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan8" type="radio" id="p8.3" value="3">
                                    <label class="form-check-label" for="p8.3">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan8" type="radio" id="p8.4" value="4" >
                                    <label class="form-check-label" for="p8.4">
                                        Sangat Baik
                                    </label>
                                </div>
                            <!-- end pertanyaan 8 -->

                            <!-- Pertanyaan 9 -->
                                <p class="mt-sm-5">
                                    9. Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan9" type="radio" id="p9" value="1" checked>
                                    <label class="form-check-label" for="p9">
                                        Tidak ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan9" type="radio" id="p9.2" value="2">
                                    <label class="form-check-label" for="p9.2">
                                        Ada tetapi tidak berfungsi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan9" type="radio" id="p9.3" value="3">
                                    <label class="form-check-label" for="p9.3">
                                    Berfunsi kurang maksimal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan9" type="radio" id="p9.4" value="4" >
                                    <label class="form-check-label" for="p9.4">
                                        Dikelola dengan baik
                                    </label>
                                </div>
                            <!-- end pertanyaan 9 -->
                        </div>
                        <button type="button" class="btn btn-danger mt-sm-4 w3-left">Batal <i class="bi bi-trash"></i></button>
                        <button type="submit" name="btn_input" class="btn btn-success mt-sm-4 w3-right">Selesai <i class="bi bi-check-lg"></i></button>
                    </div>

                    <!-- end koesioner -->
                </div>
            </div>
        </div>
    </form>
    <!-- end isi -->

    <!-- footer -->   
	<div class="w3-bar w3-green w3-card w3-block">
		<p class="w3-center">Copyright &copy; 2021 DISPERPUSIP <p>
	</div>   
    <!-- end footer -->

   
</body>
</html>


