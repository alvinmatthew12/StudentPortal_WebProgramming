<?php 
if (logged_in() ===  TRUE) {
  $userdata = getUserDataByUserId($_SESSION['id']);
  $user_role = $userdata['user_role'];

  if ($user_role != '3')
  { 
    $link = $linkdomain."/portalmahasiswa/index.php?page=error";
      // $link = $linkdomain."/index.php?page=error";
    
      echo '<script type="text/javascript">
          window.location = "'.$link.'"
      </script>';
  }
  
}
if (logged_in() === FALSE) {
  $link = $linkdomain."/portalmahasiswa/index.php?page=error";
    // $link = $linkdomain."/index.php?page=error";
  
    echo '<script type="text/javascript">
        window.location = "'.$link.'"
    </script>';
}

 ?>

<div class="text-center px-4 py-4">
  <h3 class="simple-text">Register Student</h3>

  <p class="mt-4">
    <?php
      // form is submitted
      if($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $semester = $_POST['semester'];

        $alertSuccess = "<div class='alert alert-success'>";
        $alertFailed = "<div class='alert alert-danger'>";
        $success = false;

        if($name == "") {
          $alertFailed .= " * Name is Required <br />";
        }

        if($studyprogram == "") {
          $alertFailed .= " * Study Program is Required <br />";
        }

        if($username == "") {
          $alertFailed .= " * Username is Required <br />";
        }

        if($password == "") {
          $alertFailed .= " * Password is Required <br />";
        }

        if($cpassword == "") {
          $alertFailed .= " * Conform Password is Required <br />";
        }

        if($semester == "") {
          $alertFailed .= " * Conform Password is Required <br />";
        }

        if($name && $studyprogram && $username && $password && $cpassword && $semester) {

          if($password == $cpassword) {
            if(userExists($username) === TRUE) {
              $alertFailed .= $_POST['username'] . " already exists !!";
            } else {
              if(registerStudent() === TRUE) {
                $alertSuccess .= "Successfully Registered";
                $success = true;
              } else {
                $alertFailed .= "Error";
              }
            }
          } else {
            $alertFailed .= " * Password does not match with Confirm Password <br />";
          }
        }
        if ($success == true)
        {
          $alertSuccess .= "</div>";
          echo $alertSuccess;
        } else {
          $alertFailed .= "</div>";
          echo $alertFailed;
        }

      }
    ?>
  </p>

  <form action="" method="POST">
      <div class="form-group">
        <input type="username" class="form-control" name="username" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="student_id" placeholder="Student ID">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Full Name">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Study Program</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="studyprogram">
          <option selected>Choose...</option>
          
          <?php
            $result = getAllStudyProgram();

            if ($result != false) 
            {
              while ($row = $result->fetch_assoc()) 
              {
                $studyprogram_id = $row['studyprogram_id'];
                $studyprogram_name = $row['studyprogram'];
              
          ?>

          <option value="<?php echo $studyprogram_id; ?>"><?php echo $studyprogram_name; ?></option>

          <?php        
              }
            }
          ?>
        </select>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Semester</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="semester">
        <option selected>Choose...</option>
          
                <?php
                  $result = getAllSemester();

                  if ($result != false) 
                  {
                      while ($row = $result->fetch_assoc()) 
                    {
                      $semester_id = $row['semester_id'];
                      $semester_name = $row['semester_name'];
                  
                ?>

              <option value="<?php echo $semester_id; ?>"><?php echo $semester_name; ?></option>

              <?php        
                  }
              }
              ?>
          </select>
      </div>

      <button type="submit" name="register" class="btn btn-secondary my-2">Register</button>
  </form>

</div>

