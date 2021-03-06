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
<div class="text-center pb-4 px-4">
  <h3 class="simple-text py-4">Edit Student Data</h3>

  <p class="mt-4 text-danger">
    
    <?php 
      $id = $_GET['id'];

      // form is submitted
      if($_POST) {

        $student_id = $_POST['student_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $semester = $_POST['semester'];

            $alertSuccess = "<div class='alert alert-success'>";
            $alertFailed = "<div class='alert alert-danger'>";
            $success = false;

          if($student_id == "") {
            $alertFailed .= "Student ID is Required <br />";
          }

          if($name == "") {
            $alertFailed .= "Student Name is Required <br />";
          }

          if($studyprogram == "") {
            $alertFailed .= "Student Study Program is Required <br />";
          }

          if($semester == "") {
            $alertFailed .= "Student Semester is Required <br />";
          }

          if($student_id && $name && $studyprogram && $semester) {

            if (updateStudentData($id) === TRUE) {
              $alertSuccess .= "Successfully Update Student Data";
              $success = true;

              $link = $linkdomain."/portalmahasiswa/index.php?page=student&status=successedit";
              // $link = $linkdomain."/index.php?page=student&status=successedit";
          
            echo '<script type="text/javascript">
              window.location = "'.$link.'"
            </script>';

            } else{
              $alertFailed .= "Failed to Update Student Data";
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

    <?php 
      $result = getStudent($id);

      if ($result != false) {
        while ($row = $result->fetch_assoc()) {
          $student_id = $row['student_id'];
          $name = $row['name'];
          $semester = $row['current_semester'];
          $studyprogram_id_slc = $row['studyprogram_id'];
          $studyprogram_slc = $row['studyprogram'];

    ?>


      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Student ID</label>
        </div>
        <input type="text" class="form-control" name="student_id" placeholder="Enter Student ID" value="<?php echo $student_id; ?>">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Student Name</label>
        </div>
        <input type="text" class="form-control" name="name" placeholder="Enter Student Name" value="<?php echo $name; ?>">
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Study Program</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="studyprogram">
        <option selected value="<?php echo $studyprogram_id_slc; ?>"><?php echo $studyprogram_slc ?></option>
          
                <?php
                  $result = getAllStudyProgram();

                  if ($result != false) 
                  {
                      while ($row = $result->fetch_assoc()) 
                    {
                      $studyprogram_id = $row['studyprogram_id'];
                      $studyprogram = $row['studyprogram'];
                  
                ?>

              <option value="<?php echo $studyprogram_id; ?>"><?php echo $studyprogram; ?></option>

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
        <option selected value="<?php echo $semester; ?>"><?php echo $semester ?></option>
          
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


      <?php
        }
      }

     ?>


      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Update Now!</button>
        <a href="<?php echo $baseUrl.'index.php?page=student'; ?>" class="btn btn-secondary"> Back</a>  
      </div>
      

  </form>
</div>
