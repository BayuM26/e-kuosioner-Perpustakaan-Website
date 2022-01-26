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
    <title>From Angket IBM</title>

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

            </head>

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

    
        if(isset($_POST['umur']) == '' || isset($_POST['jk']) == '' || isset($_POST['pendidikan']) == '' || isset($_POST['pekerjaan']) == ''){
            echo'
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol> 
            </svg> 

            <div class="alert alert-warning d-flex alert-dismissible align-items-center w3-animate-opacity" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    DATA RESPONDEN BELUM LENGKAP!!!
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else{
                $umur = $_POST['umur'];
                $jk = $_POST['jk'];
                $pendidikan = $_POST['pendidikan'];
                $pekerjaan = $_POST['pekerjaan'];
                $p2 = $_POST['pertanyaan2'];
                $p3 = $_POST['pertanyaan3'];
                $p4 = $_POST['pertanyaan4'];
                $p5 = $_POST['pertanyaan5'];
                $p6 = $_POST['pertanyaan6'];
                $p10 = $_POST['pertanyaan10'];
                $p12 = $_POST['pertanyaan12'];
                $p13 = $_POST['pertanyaan13'];
                $p14 = $_POST['pertanyaan14'];
                $p15 = $_POST['pertanyaan15'];
                $p16 = $_POST['pertanyaan16'];



                if($angket->InsertDataRespondenAngket($umur,$jk,$pendidikan,$pekerjaan)){
                    
                }

            
        }
    }
    ?>

    <!-- isi -->
    <form action="" method="post">
        <div class="w3-container mt-sm-5">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
            
                    <div class="form-group">

                        <h2 class="w3-center">Data Masyarakat (Responden)</h2>

                        <div class="row mt-sm-4">
                            <div class="col-sm-6">
                                <select class="form-select" name="umur">
                                    <option selected disabled>Usia</option>
                                    <option value="5-10th">5-10 TAHUN</option>
                                    <option value="11-15th">11-15 TAHUN</option>
                                    <option value="16-20th">16-20 TAHUN</option>
                                    <option value="20-25th">20-25 TAHUN</option>
                                    <option value="26-30th">26-30 TAHUN</option>
                                    <option value="31-35th">31-35 TAHUN</option>
                                    <option value="36-40th">36-40 TAHUN</option>
                                    <option value="41-45th">41-45 TAHUN</option>
                                    <option value="46-50th">46-50 TAHUN</option>
                                    <option value="51-55th">51-55 TAHUN</option>
                                    <option value="56-59th">56-59 TAHUN</option>
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
                        <h2 class="w3-center">ANGKET PENELITIAN INDEKS BACA MASYARAKAT</h2>

                        <div>

                            <!-- Pertanyaan 1 -->
                                <table class="table table-bordered border-primary">
                                    1.
                                  <tr>
                                    <td rowspan="2">Kategori Media Bacaan</td>
                                    <td rowspan="2">Jenis Media bacaan</td>
                                    <td colspan="4">Ada</td>
                                    <td rowspan="2">Tidak Ada</td>
                                   
                                  </tr>
                                
                                  <tr>
                                    <td>Milik Sendiri(Beli)</td>
                                    <td>Pinjam</td>
                                    <td>Hadiah</td>
                                    <td>Lainnya</td>
                                   
                                  </tr>
                                  <tr>
                                    <td rowspan="3">Media cetak Berupa buku</td>
                                    <td>Buku fiksi(novel,cerpen,puisi,cergam,dsb.)</td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bfm" type="checkbox" value="1">
                                      </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bfp" type="checkbox" value="1">
                                      </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bfh" type="checkbox" value="1">
                                      </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" name="bfl" type="checkbox" value="1">
                                          </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bfta" type="checkbox" value="0">
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>Buku-buku nonfiksi(buku pelajaran, buku teks, buku pengetahuan umum,dsb.)</td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bnm" type="checkbox" value="1">
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bnp" type="checkbox" value="1">
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bnh" type="checkbox" value="1">
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bnl" type="checkbox" value="1">
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" name="bnta" type="checkbox" value="0">
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                      <td>Buku-buku referens(kamus, ensiklopedia, buku tahunanm buku pedoman,
                                        buku alamat, alamanak, altlas, dukumen pemerintah dsb.)</td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="brm" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="brp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="brh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="brl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="brta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td rowspan="4">media cetak bukan buku(berkala, serial,
                                          pamflet, brosur, surat kabar, globe, tabloid, dsb)
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>surat kabar</td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="skb" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="skp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="skh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="skl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="skta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td>majalah (mingguan,bulanan,dsb)</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="mb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="mp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="mh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ml" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="mta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td>publikasi (brosur, pamflet , sebaran, dsb)</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="pb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="pp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ph" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="pl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="pta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td rowspan="5">
                                          Media bacaan berbasis elekronik (PC, dekstop, laptop, notebook, iPad, Smartphone, dll)
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>e-book</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="ebb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ebp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ebh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ebl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ebta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td>e-Journal</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="ejb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ejp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ejh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ejl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="ejta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                                  <tr>
                                      <td>Surat kabar online</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="skb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="skp" type="checkbox" value="1">
                                      </div>
                                      </td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="skh" type="checkbox" value="1">
                                      </div>
                                      </td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="skl" type="checkbox" value="1">
                                      </div>
                                      </td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="skta" type="checkbox" value="0">
                                      </div>
                                      </td>
                                  </tr>

                                  <tr >
                                      <td>media sosial(facebook, twitter, whatsapp, dll</td>
                                      <td>
                                          <div class="form-check">
                                        <input class="form-check-input" name="msb" type="checkbox" value="1">
                                      </div>
                                      </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="msp" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="msh" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="msl" type="checkbox" value="1">
                                      </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                        <input class="form-check-input" name="msta" type="checkbox" value="0">
                                      </div>
                                        </td>
                                  </tr>

                           
                              </table>
                            <!-- end pertanyaan 1 -->

                            <!-- Pertanyaan 2 -->
                                <p class="mt-sm-5">
                                    2. Berapa jumlah media bacaan yang Anda baca dalam seminggu?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2" value="1" checked>
                                    <label class="form-check-label" for="p2">
                                        1 media bacaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.2" value="2">
                                    <label class="form-check-label" for="p2.2">
                                        1-2 media bacaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.3" value="3">
                                    <label class="form-check-label" for="p2.3">
                                        3-4 media bacaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan2" type="radio" id="p2.4" value="4" >
                                    <label class="form-check-label" for="p2.4">
                                        >4 media bacaan
                                    </label>
                                </div>
                            <!-- end pertanyaan 2 -->

                            <!-- Pertanyaan 3 -->
                                <p class="mt-sm-5">
                                    3. Pernahkah Anda datang ke perpustakaan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3" value="1" checked>
                                    <label class="form-check-label" for="p3">
                                        pernah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan3" type="radio" id="p3.2" value="0">
                                    <label class="form-check-label" for="p3.2">
                                        Tidak/Belum pernah
                                    </label>
                                </div>
                            <!-- end pertanyaan 3 -->

                            <!-- Pertanyaan 4 -->
                                <p class="mt-sm-5">
                                    4. Dalam setahun terakhir ini, pernahkah Anda berkunjung ke perpustakaan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id="p4" value="1" checked>
                                    <label class="form-check-label" for="p4">
                                        pernah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan4" type="radio" id="p4.2" value="0">
                                    <label class="form-check-label" for="p4.2">
                                        Tidak/Belum pernah
                                    </label>
                                </div>
                            <!-- end pertanyaan 4 -->

                            <!-- Pertanyaan 5 -->
                                <p class="mt-sm-5">
                                    5. Jika pernah, berapa kali Anda datang ke perpustakaan dalam setahun terakhir ini?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5" value="1" checked>
                                    <label class="form-check-label" for="p5">
                                        1 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5.2" value="2">
                                    <label class="form-check-label" for="p5.2">
                                        2 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan5" type="radio" id="p5.3" value="3">
                                    <label class="form-check-label" for="p5.3">
                                        3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        Lebih dari 3 kali. Sebutkan
                                    </label>
                                    <input type="number" name="P5_diatas3" id="">
                                </div>
                            <!-- end pertanyaan 5 -->

                            <!-- Pertanyaan 6 -->
                                <p class="mt-sm-5">
                                    6. Jika "ya" berapa kali Anda datang ke perpustakaan untuk membaca dalam sebulan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6" value="1">
                                    <label class="form-check-label" for="p6">
                                        1 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.2" value="2">
                                    <label class="form-check-label" for="p6.2">
                                        2 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.3" value="3">
                                    <label class="form-check-label" for="p6.3">
                                        3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.4" value="3">
                                    <label class="form-check-label" for="p6.4">
                                        4 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.5" value="3">
                                    <label class="form-check-label" for="p6.5">
                                        5 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan6" type="radio" id="p6.6" value="3">
                                    <label class="form-check-label" for="p6.6">
                                        6 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        Lebih dari 6 kali. Sebutkan
                                    </label>
                                    <input type="number" name="P6_diatas6" id="">
                                </div>
                            <!-- end pertanyaan 6 -->

                            <!-- Pertanyaan 10 -->
                                <p class="mt-sm-5">
                                    10. Apakah Anda sudah menjadi anggota perpustakaan di daerah Anda?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan10" type="radio" id="p10" value="1" checked>
                                    <label class="form-check-label" for="p10">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan10" type="radio" id="p10.2" value="0">
                                    <label class="form-check-label" for="p10.2">
                                        Tidak
                                    </label>
                                </div>
                            <!-- end pertanyaan 10 -->

                            <!-- Pertanyaan 12 -->
                                <p class="mt-sm-5">
                                    12. Apakah Anda mendapat kemudahan untuk memperoleh bahan bacaan?
                                </p>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan12" type="radio" id="p12" value="1" checked>
                                    <label class="form-check-label" for="p12">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pertanyaan12" type="radio" id="p12.2" value="0">
                                    <label class="form-check-label" for="p12.2">
                                        Tidak
                                    </label>
                                </div>
                            <!-- end pertanyaan 12 -->

                            
                            <!-- Pertanyaan 13 -->
                            <p class="mt-sm-5">
                                13. Apa tujuan Anda membaca?
                            </p>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan13" type="radio" id="p13" value="1" checked>
                                <label class="form-check-label" for="p13">
                                    Menambah pengetahuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan13" type="radio" id="p13.2" value="0">
                                <label class="form-check-label" for="p13.2">
                                    Mengisi waktu luang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan13" type="radio" id="p13.3" value="0">
                                <label class="form-check-label" for="p13.3">
                                    Memperoleh kepastian informasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan13" type="radio" id="p13.4" value="0">
                                <label class="form-check-label" for="p13.4">
                                    Hiburan
                                </label>
                            </div>
                        <!-- end pertanyaan 13 -->

                        
                            <!-- Pertanyaan 14 -->
                            <p class="mt-sm-5">
                                14. Apakah Anda membaca karena ingin memenuhi kebutuhan informasi dan pengetahuan anda?
                            </p>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan14" type="radio" id="p14" value="1" checked>
                                <label class="form-check-label" for="p12">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan12" type="radio" id="p14.2" value="0">
                                <label class="form-check-label" for="p14.2">
                                    Tidak
                                </label>
                            </div>
                        <!-- end pertanyaan 14 -->

                        
                            <!-- Pertanyaan 15 -->
                            <p class="mt-sm-5">
                                15. Berapa lama Anda membaca setiap kali membaca?
                            </p>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan15" type="radio" id="p15" value="1" checked>
                                <label class="form-check-label" for="p15">
                                    Kurang dari 30 menit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan15" type="radio" id="p15.2" value="2">
                                <label class="form-check-label" for="p15.2">
                                    30 menit - 59 menit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan15" type="radio" id="p15.3" value="3">
                                <label class="form-check-label" for="p15.3">
                                    1 - 2 jam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan15" type="radio" id="p15.4" value="4">
                                <label class="form-check-label" for="p15.4">
                                    lebih dari 2 jam
                                </label>
                            </div>
                        <!-- end pertanyaan 12 -->

                        
                            <!-- Pertanyaan 16 -->
                            <p class="mt-sm-5">
                                16. Berapa kali Anda membaca dalam seminggu?
                            </p>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16" value="1" checked>
                                <label class="form-check-label" for="p16">
                                    Kurang dari 3 kali
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16.2" value="2">
                                <label class="form-check-label" for="p16.2">
                                    3 kali
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16.3" value="3">
                                <label class="form-check-label" for="p16.3">
                                    4 kali
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16.4" value="4">
                                <label class="form-check-label" for="p16.4">
                                    5 kali
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16.5" value="5">
                                <label class="form-check-label" for="p16.5">
                                    6 kali
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pertanyaan16" type="radio" id="p16.6" value="6">
                                <label class="form-check-label" for="p16.6">
                                    Lebih dari 6 kali
                                </label>
                            </div>
                        <!-- end pertanyaan 16 -->


                            </div>
                            <button type="button" class="btn btn-danger mt-sm-4 w3-left mb-lg-5">Batal <i class="bi bi-trash"></i></button>
                            <button type="submit" name="btn_input" class="btn btn-success mt-sm-4 w3-right mb-lg-5">Selesai <i class="bi bi-check-lg"></i></button>
                        </div>
                    <!-- end koesioner -->
                </div>
            </div>
        </div>
    </form>
    <!-- end isi -->

    <!-- footer -->   
	<div class="w3-bar w3-green w3-card w3-block">
        <p class="w3-center">Copyright &copy; 2022 BAYU MAULANA <p>
    </div>   
    <!-- end footer -->

   
</body>
</html>


