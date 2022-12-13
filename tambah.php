<?php
include ('koneksi.php');

if(isset($_POST['tAdmin'])){
// Deklarasi variable
$username = $_POST['username'];
$password=md5($_POST['password']);
$nama = $_POST['nama'];
 if(empty($username) or empty($password)){

  echo "<script>alert('Username atau password tidak boleh kosong!!!'); history.go(-1); </script>";
 }else{
  $ins = mysqli_query($con,"insert into admin(username,password,nama) values ('$username','$password','$nama')");
  echo "<script>alert('Data berhasil di Tambah');</script>";
   header("location:index_admin.php?page=profil");
 }
}



// ------------tmbahOPERATOR--------------------------

if(isset($_POST['tAdmin'])){
// Deklarasi variable
$username_op = $_POST['username'];
$password_op=$_POST['password'];
$nama_op = $_POST['nama'];
 if(empty($username_op) or empty($password_op)){

  echo "<script>alert('Username atau password tidak boleh kosong!!!'); history.go(-1); </script>";
 }else{
  $ins = mysqli_query($con,"insert into operator(username_op,password_op,nama_op) values ('$username_op','$password_op','$nama_op')");
  echo "<script>alert('Data berhasil di Tambah');</script>";
   header("location:index_admin.php?page=profil");
 }
}





//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
if(isset($_POST['tData'])){
// Deklarasi variable
// $no = $_POST['no'];

$id_perindustrian=1;
$nama_perusahaan = $_POST['nama_perusahaan'];
$nama_pemilik = $_POST['nama_pemilik'];  
$desa_kel = $_POST['desa_kel'];
$kecamatan = $_POST['kecamatan'];
$jenis_industri = $_POST['jenis_industri'];
$jenis_produk = $_POST['jenis_produk'];
$tenaga_kerja = $_POST['tenaga_kerja'];


// ---foto
 // $ekstensi_diperbolehkan  = array('png','jpg','jpeg');
 //  $foto = $_FILES['foto']['name'];
 //  $x = explode('.', $foto);
 //  $ekstensi = strtolower(end($x));
 //  $ukuran = $_FILES['foto']['size'];
 //  $file_tmp = $_FILES['foto']['tmp_name'];

 //  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      // move_uploaded_file($file_tmp, 'images/fotokeag/'.$foto);
      $query = mysqli_query($con,"INSERT INTO data_kerajinan(id_perindustrian,nama_perusahaan,nama_pemilik,desa_kel,kecamatan,jenis_industri,jenis_produk,tenaga_kerja) values('$id_perindustrian','$nama_perusahaan','$nama_pemilik','$desa_kel','$kecamatan','$jenis_industri','$jenis_produk','$tenaga_kerja')");
  if($query){
     header("location:index_admin.php?page=daftar_kerajinan");
       }else{
        echo "<script>alert('Gagal Simpan!');history.go(-1);</script>";
      }

  //  }else{
  //  echo "<script>alert('d harus JPG atau PNG');history.go(-1);</script>";
  // }
}



if(isset($_POST['tParoki1'])){
// Deklarasi variable
// $no = $_POST['no'];

$Paroki = $_POST['Paroki'];
$pelindung = $_POST['pelindung'];  
$buku_baptis = $_POST['buku_baptis'];
$nama_pastor = $_POST['nama_pastor'];
$jumlah_umat = $_POST['jumlah_umat'];
$dekenat = $_POST['dekenat'];
$alamat = $_POST['alamat'];
$d_perindustrian=1;

// ---foto
 // $ekstensi_diperbolehkan  = array('png','jpg','jpeg');
 //  $foto = $_FILES['foto']['name'];
 //  $x = explode('.', $foto);
 //  $ekstensi = strtolower(end($x));
 //  $ukuran = $_FILES['foto']['size'];
 //  $file_tmp = $_FILES['foto']['tmp_name'];

 //  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      // move_uploaded_file($file_tmp, 'images/fotokeag/'.$foto);
      $query = mysqli_query($con,"insert into daftar_paroki1 values ('','$d_perindustrian','$Paroki','$pelindung','$buku_baptis','$nama_pastor','$jumlah_umat','$dekenat','$alamat')");
  if($query){
     header("location:index_admin.php?page=daftar1");
       }else{
        echo "<script>alert('Gagal Simpan!');history.go(-1);</script>";
      }

  //  }else{
  //  echo "<script>alert('d harus JPG atau PNG');history.go(-1);</script>";
  // }
}




//-----------------
if(isset($_POST['tLokasiKerajinan'])){
// Deklarasi variable
$informasi = $_POST['informasi'];
$nama = $_POST['nama'];

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$d_perindustrian=1;
//---foto
 $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
  $foto = $_FILES['foto']['name'];
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

      move_uploaded_file($file_tmp, 'img/fotokeag/'.$foto);
      $query = mysqli_query($con,"insert into lokasi_kerajinan values ('','$d_perindustrian','$nama','$informasi','$longitude','$latitude','$foto')");
  if($query){
     header("location:index_admin.php?page=lokasi_kerajinan");
       }else{
        echo "<script>alert('Gagal Simpan!');history.go(-1);</script>";
      }

  }else{
  echo "<script>alert('Ekstensi File harus JPG atau PNG');history.go(-1);</script>";
  }
}

// -------------------------------------

if(isset($_POST['tKutipan'])){
// Deklarasi variable
$isi = $_POST['isi'];
$ayat = $_POST['ayat'];

$d_perindustrian=1;
//---foto
 

  
      $query = mysqli_query($con,"insert into kutipan values ('','$d_perindustrian','$ayat','$isi')");
  if($query){
     header("location:index_admin.php?page=tambahKutipan");
       }else{
        echo "<script>alert('Gagal Simpan!');history.go(-1);</script>";
      }

  }



// ------------------------------------


  if(isset($_POST['tInformasi'])){
// Deklarasi variable
$informasi = $_POST['informasi'];


$d_perindustrian=1;
//---foto
 

  
      $query = mysqli_query($con,"insert into informasi values ('','$d_perindustrian','$informasi')");
  if($query){
     header("location:index_admin.php?page=tambahInfKeus");
       }else{
        echo "<script>alert('Gagal Simpan!');history.go(-1);</script>";
      }

  }



 ?>
