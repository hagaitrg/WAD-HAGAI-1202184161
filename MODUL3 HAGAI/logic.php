<?php

class logic
{
    var $host = "localhost";
    var $username = "root";
    var $pwd = "";
    var $db = "wad_modul3_hagai";
    var $conn = "";

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->pwd, $this->db);
        if (mysqli_connect_error()) {
            echo "Koneksi ke DB gagal : " . mysqli_connect_error();
        }
    }

    function read()
    {
        $data = mysqli_query($this->conn, "select * from modul3_crud");
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }

        if (mysqli_num_rows($data) > 0) {
            return $result;
        }
    }

    function create($nama, $desc, $kategori, $tgl, $mulai, $selesai, $tempat, $harga, $benefit, $name, $ukuran, $error, $tmp)
    {
        $gambar = $this->upload($name, $ukuran, $error, $tmp);

        if (!$gambar) {
            return false;
        }

        $tgl = date('y/m/d');

        mysqli_query($this->conn, "insert into modul3_crud(name,deskripsi,gambar,kategori,tanggal,mulai,berakhir,tempat,harga,benefit) 
        values ('$nama','$desc','$gambar','$kategori','$tgl','$mulai','$selesai','$tempat','$harga','$benefit')");
        return mysqli_affected_rows($this->conn);
    }

    function upload($name, $ukuran, $error, $tmp)
    {
        if ($error === 4) {
            echo "<script> 
                    alert('Gambar belum di pilih!');
                </script>";
            return false;
        }

        $ekstensi = ['jpg', 'png'];
        $cek = explode('.', $name);
        $cek = strtolower(end($cek));

        if (!in_array($cek, $ekstensi)) {
            echo "<script> 
                    alert('Tidak Sesuai ekstensi!');
                </script>";
            return false;
        }

        if ($ukuran > 1000000) {
            echo "<script> 
                    alert('Ukuran tidak boleh melebihi 1 mb');
                </script>";
            return false;
        }

        move_uploaded_file($tmp, './assets/img/' . $name);

        return $name;
    }

    function get_id($id)
    {
        $get = mysqli_query($this->conn, "select * from modul3_crud where id = '$id'");
        return $get->fetch_array();
    }

    function delete($id)
    {
        mysqli_query($this->conn, "delete from modul3_crud where id = '$id'");
        return mysqli_affected_rows($this->conn);
    }

    function edit($id, $nama, $desc, $kategori, $tgl, $mulai, $selesai, $tempat, $harga, $benefit, $name, $ukuran, $error, $tmp)
    {
        $gambar = $this->upload($name, $ukuran, $error, $tmp);

        if (!$gambar) {
            return false;
        }

        mysqli_query($this->conn, "UPDATE modul3_crud  
        SET name = '$nama', deskripsi='$desc', gambar ='$gambar', kategori = '$kategori', tanggal = '$tgl', mulai='$mulai',berakhir='$selesai', tempat='$tempat', harga='$harga', benefit='$benefit' 
        WHERE id = '$id' ");
        return mysqli_affected_rows($this->conn);
    }
}
