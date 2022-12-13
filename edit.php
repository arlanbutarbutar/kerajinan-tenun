<?php
include ('koneksi.php');

if(isset($_POST["editAdmin"])){
$id_admin=$_GET['id'];
$result=mysqli_query($con, "SELECT * FROM admin WHERE username='$id_admin'");
$data=mysqli_fetch_array($result);
$username=$_POST['username'];
$nama=$_POST['nama'];

$exe	= mysqli_query($con,"UPDATE admin SET username='$username',nama='$nama' WHERE username='$id_admin'");
if($exe){
  session_start();
  $_SESSION['SESS_USERNAME']=$username;
header("location:index_admin.php?page=profil");
}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}


//------------------------------------------------------ ubah password
if(isset($_POST["ePassword"])){
  $id_admin=$_GET['id'];

  $result=mysqli_query($con, "SELECT * FROM admin WHERE username='$id_admin'");
  $data=mysqli_fetch_array($result);
  $passlama=md5($_POST['passlama']);
  $password=md5($_POST['passbaru']);
  // $passlama=$_POST['passlama'];
  // $password=$_POST['passbaru'];

  if($passlama==$data["password"]){
    $exe	= mysqli_query($con,"UPDATE admin SET password='$password' WHERE username='$id_admin'");
    if($exe){
     echo "<script>
        alert('Password berhasil diubah');
        window.location.href='index_admin.php?page=profil';
      </script>";
    }
    else{
     // pemberitahuan jika error
     echo "<script>alert('Password gagal diubah');history.go(-1);</script>";
    }
  }else{
    echo "<script>alert('Password lama salah!');history.go(-1);</script>";
  }
}

if(isset($_POST["editPerindustrian"])){
$id=$_GET['id'];
$nama=$_POST['nama'];

$exe	= mysqli_query($con,"UPDATE d_perindustrian SET nama='$nama' WHERE id_perindustrian='$id'");
if($exe){
header("location:index_admin.php?page=perindustrian");
}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}



//------------------------


//------------------------
if(isset($_POST["eFotoKesehatan"])){
  $id=$_GET["id"];

  $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
  $foto = $_FILES['foto']['name'];
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];


  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      move_uploaded_file($file_tmp, 'images/fotokes/'.$foto);
      $query	= mysqli_query($con,"UPDATE daftar_paroki SET foto='$foto' WHERE id_par='$id'");
      if($query){
     header("location:index_admin.php?page=daftar");
       }else{
        echo "<script>alert('Gagal Upload!');history.go(-1);</script>";
      }

  }else{
  echo "<script>alert('Ekstensi File harus JPG atau PNG');history.go(-1);</script>";
  }
}

if(isset($_POST["eData"])){
$id=$_GET['id'];
$nama_perusahaan = $_POST['nama_perusahaan'];
$nama_pemilik = $_POST['nama_pemilik'];  
$desa_kel = $_POST['desa_kel'];
$kecamatan = $_POST['kecamatan'];
$jenis_industri = $_POST['jenis_industri'];
$jenis_produk = $_POST['jenis_produk'];
$tenaga_kerja = $_POST['tenaga_kerja'];


$exe	= mysqli_query($con,"UPDATE data_kerajinan SET nama_perusahaan='$nama_perusahaan',nama_pemilik='$nama_pemilik',desa_kel='$desa_kel',kecamatan='$kecamatan',jenis_industri='$jenis_industri',jenis_produk='$jenis_produk',tenaga_kerja='$tenaga_kerja' WHERE id_ker='$id'");
if($exe){
  header("location:index_admin.php?page=daftar_kerajinan");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}

//------------------------

if(isset($_POST["eParoki1"])){
$id=$_GET['id'];
$Paroki = $_POST['Paroki'];
$pelindung = $_POST['pelindung'];  
$buku_baptis = $_POST['buku_baptis'];
$nama_pastor = $_POST['nama_pastor'];
$jumlah_umat = $_POST['jumlah_umat'];
$dekenat = $_POST['dekenat'];
$alamat = $_POST['alamat'];


$exe  = mysqli_query($con,"UPDATE daftar_paroki1 SET Paroki='$Paroki',pelindung='$pelindung',buku_baptis='$buku_baptis',nama_pastor='$nama_pastor',jumlah_umat='$jumlah_umat',dekenat='$dekenat',alamat='$alamat' WHERE id_par='$id'");
if($exe){
  header("location:index_admin.php?page=daftar1");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}



//-------EDITadmin-----------------
if(isset($_POST["eFotoKerajinan"])){
  $id=$_GET["id"];

  $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
  $foto = $_FILES['foto']['name'];
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];


  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      move_uploaded_file($file_tmp, 'images/1/'.$foto);
      $query	= mysqli_query($con,"UPDATE lokasi_kerajinan SET foto='$foto' WHERE id_kerajinan='$id'");
      if($query){
     header("location:index_admin.php?page=lokasi_kerajinan");
       }else{
        echo "<script>alert('Gagal Upload!');history.go(-1);</script>";
      }

  }else{
  echo "<script>alert('Ekstensi File harus JPG atau PNG');history.go(-1);</script>";
  }
}

if(isset($_POST["eLokasiKerajinan"])){
$id=$_GET['id'];
$informasi = $_POST['informasi'];
$nama = $_POST['nama'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$exe	= mysqli_query($con,"UPDATE lokasi_kerajinan SET nama='$nama',informasi='$informasi',latitude='$latitude',longitude='$longitude' WHERE id_kerajinan='$id'");
if($exe){
  header("location:index_admin.php?page=lokasi_kerajinan");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}

//----------EDIToperator--------------
if(isset($_POST["eFotoKeagamaanOP"])){
  $id=$_GET["id"];

  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $foto = $_FILES['foto']['name'];
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];


  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      move_uploaded_file($file_tmp, 'images/1/'.$foto);
      $query  = mysqli_query($con,"UPDATE gereja_stasi SET foto='$foto' WHERE id_perindustrian='$id'");
      if($query){
     header("location:index_operator.php?page=gereja");
       }else{
        echo "<script>alert('Gagal Upload!');history.go(-1);</script>";
      }

  }else{
  echo "<script>alert('Ekstensi File harus JPG atau PNG');history.go(-1);</script>";
  }
}

if(isset($_POST["eKeagamaanOP"])){
$id=$_GET['id'];
$informasi = $_POST['informasi'];
$nama = $_POST['nama'];


$exe  = mysqli_query($con,"UPDATE gereja_stasi SET nama='$nama',informasi='$informasi' WHERE id_perindustrian='$id'");
if($exe){
  header("location:index_operator.php?page=gereja");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}

if(isset($_POST["eWilayah"])){
$id=$_GET['id'];
$nama = $_POST['nama'];
$informasi = $_POST['informasi'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$exe  = mysqli_query($con,"UPDATE wilayah SET nama='$nama',informasi='$informasi',latitude='$latitude',longitude='$longitude' WHERE id='$id'");
if($exe){
  header("location:index_admin.php?page=wilayah");

}
else{
 // pemberitahuan jika error

 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}




//------------------------

if(isset($_POST["eKutipan"])){
$id=$_GET['id'];
$isi = $_POST['isi'];
$ayat = $_POST['ayat'];


$exe  = mysqli_query($con,"UPDATE kutipan SET ayat='$ayat',isi='$isi' WHERE id_kutipan='$id'");
if($exe){
  header("location:index_admin.php?page=tambahKutipan");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}


//---------------------

if(isset($_POST["eInformasi"])){
$id=$_GET['id'];
$informasi = $_POST['informasi'];



$exe  = mysqli_query($con,"UPDATE informasi SET informasi='$informasi' WHERE id_inf='$id'");
if($exe){
  header("location:index_admin.php?page=tambahInfKeus");

}
else{
 // pemberitahuan jika error
 echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
}
}



?>
