<?php
require_once 'Koneksi/koneksi.php';

// class kuesioner
class Kuesioner{
    protected $db;
    
    public function __construct($con){
        $this->db = $con;
    }

    // input data responden
        public function InsertDataResponden($umur, $Jk, $pendidikan, $pekerjaan){
                try {
                    $tanggal = Date('Y-m-d');
                    $insertdataeresponden = $this->db->prepare("INSERT INTO data_responden (umur,jenis_k,pendidikan,pekerjaan,tanggal) 
                    VALUES(:umur, :jenis_k, :pendidikan, :pekerjaan, :tanggal)");
                    
                    $insertdataeresponden->bindParam(":umur", $umur);
                    $insertdataeresponden->bindParam(":jenis_k", $Jk);
                    $insertdataeresponden->bindParam(":pendidikan", $pendidikan);
                    $insertdataeresponden->bindParam(":pekerjaan", $pekerjaan);
                    $insertdataeresponden->bindParam(":tanggal", $tanggal);
                    $insertdataeresponden->execute();

                    return true;
                }

                catch (PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

        }
    // end input data responden

    // input jawaban kuesioner
    public function Insertkuesioner($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
        try{
            $insertkuesioner = $this->db->prepare("INSERT INTO jawaban_responden (Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9) 
            VALUES(:Q1, :Q2, :Q3, :Q4, :Q5, :Q6, :Q7, :Q8, :Q9)");

            $insertkuesioner->bindParam(":Q1", $p1);
            $insertkuesioner->bindParam(":Q2", $p2);
            $insertkuesioner->bindParam(":Q3", $p3);
            $insertkuesioner->bindParam(":Q4", $p4);
            $insertkuesioner->bindParam(":Q5", $p5);
            $insertkuesioner->bindParam(":Q6", $p6);
            $insertkuesioner->bindParam(":Q7", $p7);
            $insertkuesioner->bindParam(":Q8", $p8);
            $insertkuesioner->bindParam(":Q9", $p9);
            $insertkuesioner->execute();

            return true;

            
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    // end input jawaban kuesioner

    // view jawaban kuesioner
        public function view_jawaban($query){
            $jawaban = $this->db->prepare($query);
            $jawaban->execute();

            $no = 1;
            
            while($row = $jawaban->fetch(PDO::FETCH_ASSOC)) 
            {
                $total = $row['Q1'] + $row['Q2'] + $row['Q3'] + $row['Q4'] + $row['Q5'] + $row['Q6'] + $row['Q7'] + $row['Q8'] + $row['Q9'];
                echo"
                <tr>
                    <td> {$no} </td>
                    <td> {$row['Q1']} </td>
                    <td> {$row['Q2']} </td>
                    <td> {$row['Q3']} </td>
                    <td> {$row['Q4']} </td>
                    <td> {$row['Q5']} </td>
                    <td> {$row['Q6']} </td>
                    <td> {$row['Q7']} </td>
                    <td> {$row['Q8']} </td>
                    <td> {$row['Q9']} </td>
                    <td> {$total} </td>
                </tr>";

                $no++;
                }
        }
    // end view jawaban kuesioner

    // filter excel
    public function filterExcel($query){
        $filter = $this->db->prepare($query);
        $filter->execute();

        
    }
    // end filter excel
}
// end class kuesioner

// class angket
    class angketIBM extends kuesioner{
        // view jawaban angket
            public function InsertDataRespondenAngket($umur, $Jk, $pendidikan, $pekerjaan){
                try {
                    $tanggal = Date('Y-m-d');
                    $insertdataeresponden = $this->db->prepare("INSERT INTO data_responden_angket (umur,jenis_k,pendidikan,pekerjaan,tanggal) 
                    VALUES(:umur, :jenis_k, :pendidikan, :pekerjaan, :tanggal)");
                    
                    $insertdataeresponden->bindParam(":umur", $umur);
                    $insertdataeresponden->bindParam(":jenis_k", $Jk);
                    $insertdataeresponden->bindParam(":pendidikan", $pendidikan);
                    $insertdataeresponden->bindParam(":pekerjaan", $pekerjaan);
                    $insertdataeresponden->bindParam(":tanggal", $tanggal);
                    $insertdataeresponden->execute();

                    return true;
                }

                catch (PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

            }
        // end view jawaban angket

        // tambah jawaban angket
        
        // end tambah jawaban angket
    }
// end class angket

// class user
    class User extends Kuesioner{
        // validasi login user
        public function validasilogin($username, $password){
            $loginAdmin = $this->db->prepare("SELECT * FROM user WHERE username = '$username' and password='$password'");
            $loginAdmin->execute();

            $row = $loginAdmin;

            while($row->fetch(PDO::FETCH_ASSOC))
            {
                if($loginAdmin->rowCount() == 1)
                {
                    header("Location:dashboardAdmin.php");
                }

                else if($loginAdmin->rowCount() !== 1)
                {
                
                    if(header("Location:index.php?pesan=GAGAl")){
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
                
                }
            }
        }
        // end validasi login user
    }
// end class user

$kuesioner = new kuesioner($con);
$login = new User($con);
$angket = new angketIBM($con)

?>