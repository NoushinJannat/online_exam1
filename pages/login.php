<!--Body Starts Here-->
       

                <div class="login">
        <img src="box/img/avatar.png" alt="aa" class="avatar">
        <h1>Login Here</h1>
        <?php 
                        if(isset($_SESSION['invalid']))
                        {
                            echo $_SESSION['invalid'];
                            unset($_SESSION['invalid']);
                        }
                    ?>
        <form method="post" action="">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required="true"/>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="true"/>
            <input type="submit" name="submit" value="Log In" class="btn-exit">
            <a href="#">Lost your password</a><br>
            <a href="#">Don't have an account?</a>
        </form>
    </div>
                <?php 
                    if(isset($_POST['submit']))
                    {
                        //echo "CLicked";
                        //Get Values from forms
                        $username=$obj->sanitize($conn,$_POST['username']);
                        $password=$obj->sanitize($conn,$_POST['password']);
                        //Check Login
                        $tbl_name="tbl_student";
                        $where="username='$username' && password='$password' && is_active='yes'";
                        $query=$obj->select_data($tbl_name,$where);
                        $res=$obj->execute_query($conn,$query);
                        $count_rows=$obj->num_rows($res);
                        if($count_rows>0)
                        {
                            $_SESSION['student']=$username;
                            $_SESSION['login']="<div class='success'>Login Successful.</div>";
                            header('location:'.SITEURL.'index.php?page=welcome');
                        }
                        else
                        {
                            $_SESSION['invalid']="<div class='error'>Username or Password is invalid.</div>";
                            header('location:'.SITEURL.'index.php?page=login');
                        }
                    }
                ?>
            </div>
        </div>
        <!--Body Ends Here-->