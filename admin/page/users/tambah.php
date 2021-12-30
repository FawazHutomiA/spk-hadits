<?php
    if (isset($_POST['simpan'])){
        $username=$_POST['username'];
        $pass=md5($_POST['pass']);
        $nama=$_POST['nama'];
        $level=$_POST['level'];

        $sql = "SELECT*FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            ?>
                <script>alert("username sudah digunakan");</script>  
            <?php
        }else{
            $sql = "INSERT INTO users VALUES('$username','$pass','$nama','$level')";
            if (mysqli_query($conn, $sql)){
                header("location:index.php?page=users");
            }
        }
    }
    mysqli_close($conn);
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="POST" name="Form" onsubmit="return validateForm()">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>INPUT DATA USER</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Username :</label>
                        <input type="text" class="form-control" name="username" id="username" maxlength="10" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="password" class="form-control" name="pass" id="pass" maxlength="10" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input type="text" class="form-control" name="nama" id="nama" maxlength="50" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level:</label>
                        <select class="form-control chosen" data-placeholder="Pilih Level" name="level">
                        <option value=""></option>;
                            <option>Admin</option>
                            <option>Pasien</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                    <a href="?page=users" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validateForm()
    {
        var levele=document.forms["Form"]["level"].value;

        if (levele=="")
        {
            alert("Masukkan level");
            return false;
        }
    }
</script>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script>
    
    $("#username").on({
        keydown: function(e){
            if(e.which === 32)
                return false;
        },
        keyup: function(){
            this.value = this.value.toLowerCase();
        },
        change: function(){
            this.value=this.value.replace(/\s/g, "")
        }
    });

    $("#pass").on({
        keydown: function(e){
            if(e.which === 32)
                return false;
        },
        keyup: function(){
            this.value = this.value.toLowerCase();
        },
        change: function(){
            this.value=this.value.replace(/\s/g, "")
        }
    });

</script>