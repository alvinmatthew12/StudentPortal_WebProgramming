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
  <h3 class="simple-text py-4">Update Lecturer Data</h3>

  <p class="mt-4 text-danger">
    
    <?php 
      $id = $_GET['id'];

      // form is submitted
      if($_POST) {

        $lecturer_id = $_POST['lecturer_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $birth_place = $_POST['birth_place'];
        $birth_date = $_POST['birth_date'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];

        $alertSuccess = "<div class='alert alert-success'>";
        $alertFailed = "<div class='alert alert-danger'>";
        $success = false;

          if($lecturer_id == "") {
            $alertFailed .= "Lecturer ID is Required <br />";
          }

          if($name == "") {
            $alertFailed .= "Lecturer Name is Required <br />";
          }

          if($studyprogram == "") {
            $alertFailed .= "Lecturer Study Program is Required <br />";
          }

          if($lecturer_id && $name && $studyprogram) {

            if (updatelecturerDetail($id) === TRUE) {
              $alertSuccess .= "Successfully Update lecturer Data";
              $success = true;

              $link = $linkdomain."/portalmahasiswa/index.php?page=detaillecturer&status=successedit&id=".$id."";
              // $link = $linkdomain."/index.php?page=detaillecturer&status=successedit";
          
            echo '<script type="text/javascript">
              window.location = "'.$link.'"
            </script>';

            } else{
              $alertFailed .= "Failed to Update lecturer Data";
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
      $result = getlecturer($id);

      if ($result != false) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $lecturer_id = $row['lecturer_id'];
          $name = $row['name'];
          $studyprogram_id_slc = $row['studyprogram_id'];
          $studyprogram_slc = $row['studyprogram'];
          $birth_place = $row['birth_place'];
          $birth_date = $row['birth_date'];
          $phone_num = $row['phone_num'];
          $religion_id = $row['religion_id'];
          $religion = $row['religion'];
          $status = $row['status'];
          $gender = $row['gender'];

    ?>



      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Lecturer ID</label>
          </div>
          <input type="text" class="form-control" name="lecturer_id" placeholder="Enter lecturer ID" value="<?php echo $lecturer_id; ?>">
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Lecturer Name</label>
          </div>
          <input type="text" class="form-control" name="name" placeholder="Enter lecturer Name" value="<?php echo $name; ?>">
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
              <label class="input-group-text" for="inputGroupSelect01">Birth Place</label>
          </div>
          <input type="text" class="form-control" name="birth_place" placeholder="Enter lecturer Birth Place" value="<?php echo $birth_place; ?>">
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Birthday</label>
          </div>
          <input type="text" class="form-control" name="birth_date" placeholder="Eg: 12 October 2019" value="<?php echo $birth_date; ?>">
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Religion</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="religion">
              <option selected value="<?php echo $religion_id; ?>"><?php echo $religion ?></option>
          
                <?php
                  $result = getAllReligion();

                  if ($result != false) 
                  {
                      while ($row = $result->fetch_assoc()) 
                    {
                      $religion_id = $row['religion_id'];
                      $religion = $row['religion'];
                  
                ?>

              <option value="<?php echo $religion_id; ?>"><?php echo $religion; ?></option>

              <?php        
                  }
              }
              ?>
          </select>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Birthday</label>
          </div>
          <input type="text" class="form-control" name="phone_num" placeholder="Eg: +628XXXXXXXXX" value="<?php echo $phone_num; ?>">
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Gender</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="gender">
        <option selected value="<?php echo $gender; ?>"><?php echo $gender ?></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
      </div>


      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Update Now!</button>
        <a href="<?php echo $baseUrl.'index.php?page=lecturer'; ?>" class="btn btn-secondary"> Back</a>  
      </div>

      <?php 
          }

      }

       ?>

  </form>
</div>
