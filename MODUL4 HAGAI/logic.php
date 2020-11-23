<?php

class logic
{
    var $host = "localhost";
    var $user = "root";
    var $pwd = "";
    var $db = "wad_modul4";
    var $conn = "";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pwd, $this->db);
        if (mysqli_connect()) {
            echo "Koneksi DB gagl : " . mysqli_connect();
        }
    }

    public function registrasi($data)
    {
        $name = strtolower(stripslashes($data['nama']));
        $email = $data['email'];
        $nohp = $data['hp'];
        $pwd = $data['password'];
        $pwd2 = $data['password2'];

        $cek = mysqli_query($this->conn, "select nama from user where nama = '$name'");
        if (mysqli_fetch_array($cek)) {
            echo
                "
            <script> 
                alert('Username telah terdaftar');
            </script>
        ";
            return false;
        }

        if ($pwd != $pwd2) {
            echo
                "
            <script> 
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
            return false;
        }

        $pwd = password_verify($pwd, PASSWORD_DEFAULT);

        mysqli_query($this->conn, "insert into user values('','$name','$email','$nohp','$pwd')");

        return mysqli_affected_rows($this->conn);
    }

    public function create_cart($usr_id, $barang, $harga)
    {
        mysqli_query($this->conn, "insert into cart(user_id, nama_barang, harga) values ('$usr_id','$barang','$harga')");
        return mysqli_affected_rows($this->conn);
    }

    public function read()
    {
        $data = mysqli_query($this->conn, "select * from cart");

        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }

        if (mysqli_num_rows($data) > 0) {
            return $result;
        }
    }

    public function delete($id_barang)
    {
        mysqli_query($this->conn, "delete from cart where id = '$id_barang'");
        return mysqli_affected_rows($this->conn);
    }

    public function get_id($id)
    {
        $get = mysqli_query($this->conn, "select * from user where id ='$id'");
        return $get->fetch_array();
    }

    public function edit($id, $nama, $email, $hp, $pwd, $warna)
    {
        if (empty($pwd)) {
            mysqli_query($this->conn, "update user set nama ='$nama', email='$email', no_hp='$hp' where id='$id'");
        } else {
            mysqli_query($this->conn, "update user set nama ='$nama', email='$email', no_hp='$hp', password='$pwd' where id = '$id'");
        }

        setcookie('colors', $warna, strtotime('+5 years'), '/');

        return mysqli_affected_rows($this->conn);
    }
}
