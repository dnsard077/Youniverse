<?php
    $conn = mysqli_connect('localhost', 'root', '', 'youniverse');

    function register(){
        global $conn;

        $email = $_POST['user'];
        $q1 = mysqli_real_escape_string($conn, $_POST['q1']);
        $answeruser = mysqli_real_escape_string($conn, $_POST['answeruser']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $konfimrasi = mysqli_real_escape_string($conn, $_POST['konfirmasi']);

        $result = mysqli_query($conn, "select email from user where email='$email'");

        if (mysqli_fetch_assoc($result)){
            echo "<script>
                alert('email sudah terdaftar')
            </script>";
            return false;
        }

        if ($password !== $konfimrasi){
            echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "insert into user values ('$email', '$password', '', '', 'Member', '', '', '$q1', '$answeruser','')");


        return mysqli_affected_rows($conn);
    }
    function upload(){
	
        $filename = $_FILES['pic']['name'];
        $filesize = $_FILES['pic']['size'];
        $error = $_FILES['pic']['error'];
        $tmpName = $_FILES['pic']['tmp_name'];
    
        //cek apakah gambar sudah diupload
        if ( $error === 4) {
            echo "<script>
                    alert('gambar belum diupload');
                </script>";
            return false;
        }
    
        //cek apakah benar ekstensi gambar yang diupload
        $fileextVal = ['jpeg', 'jpg', 'png'];
        $fileext = explode('.', $filename); 
        $fileext = strtolower(end($fileext));
        
        if ( !in_array($fileext, $fileextVal) ) {
            echo "<script>
                    alert('ekstensi gambar yang diperbolehkan adalah jpeg, jpg, png');
                </script>";
            return false;
        }
    
        //cek jika size melebihi yang diperbolehkan
        if ( $filesize > 11500000) {
            echo "<script>
                    alert('gambar melebihi ukuran yang diperbolehkan');
                </script>";
            return false;
        }
    
        //lolos pengecekan, file dimasukkan ke dalam database
        //buat nama file menjadi unik
        $newfilename = uniqid();
        $newfilename .= '.';
        $newfilename .= $fileext;
    
        move_uploaded_file($tmpName, 'assets/img/user_profile/'. $newfilename);
    
        return $newfilename;
    }
    function edit($data){
        global $conn;
        $email= $_SESSION['login']['email'];
        $ambil = mysqli_query($conn,"SELECT * FROM user WHERE user.email='$email'");
        $detail = mysqli_fetch_assoc($ambil);

        global $conn;
    
        //ambil semua data yang dikirimkan oleh form
        $pic = $detail['pic']; 
        $first_name = htmlspecialchars($data['first']);
        $last_name = htmlspecialchars($data['last']);
        $phone = htmlspecialchars($data['phone']);
        $address = htmlspecialchars($data['address']);
        

        //cek jika user mengubah gambar
        if ( $_FILES['pic']['error'] === 4 ) {
            $pics = $pic;
        }else{
            $pics = upload();
        }

        mysqli_query($conn ,"UPDATE user SET first_name='$first_name', last_name='$last_name', phone='$phone', address='$address', pic='$pics' WHERE email='$email'");
        return mysqli_affected_rows($conn);
    }
?>