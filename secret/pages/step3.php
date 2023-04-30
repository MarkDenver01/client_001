<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $conn = false;
  // ob_start();
  $conn = new mysqli($_POST['DB_HOST'], $_POST['DB_USERNAME'], $_POST['DB_PASSWORD']);
  if ($conn->connect_error) {
    $error = 'Unable to connect to the database. Please check your credentials.';
  }

  if(!$conn){
    $error = "Given Database Credentials is incorrect";
  }else{
    $check_db = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$_POST['DB_NAME']}'")->num_rows;
    if($check_db > 0){
      $error = 'Database already exist. Please use a different name to prevent data loss on your database.';
    }else{
      // echo "CREATE DATABASE `{$_POST['DB_NAME']}`";
      // $conn->close();
      // exit;
      $create_db = $conn->query("CREATE DATABASE `{$_POST['DB_NAME']}`");
      if($create_db){
        $conn->select_db($_POST['DB_NAME']);
        include_once('./default/db.php');

        // user account
        if(isset($db_sql_1)){
          foreach($db_sql_1 as $sql){
            $conn->query($sql);
            if($conn->error){
              die($conn->error);
            }
          }
        }

        // user groups
        if (isset($db_sql_2)) {
          foreach ($db_sql_2 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
               die($conn->error);
            }
          }
        }

        // student info
        if (isset($db_sql_3)) {
          foreach ($db_sql_3 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // student info
        if (isset($db_sql_4)) {
          foreach ($db_sql_4 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // authentication
        if (isset($db_sql_5)) {
          foreach ($db_sql_5 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // login logs
        if (isset($db_sql_6)) {
          foreach ($db_sql_6 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // conversation logs
        if (isset($db_sql_7)) {
          foreach ($db_sql_7 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // chat logs
        if (isset($db_sql_8)) {
          foreach ($db_sql_8 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // announcement logs
        if (isset($db_sql_9)) {
          foreach ($db_sql_9 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // exam created
        if (isset($db_sql_10)) {
          foreach ($db_sql_10 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // exam schedule
        if (isset($db_sql_11)) {
          foreach ($db_sql_11 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // student records
        if (isset($db_sql_12)) {
          foreach ($db_sql_12 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // assign exam record
        if (isset($db_sql_13)) {
          foreach ($db_sql_13 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // exam category
        if (isset($db_sql_14)) {
          foreach ($db_sql_14 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // reading
        if (isset($db_sql_15)) {
          foreach ($db_sql_15 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // writing
        if (isset($db_sql_16)) {
          foreach ($db_sql_16 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // speaking
        if (isset($db_sql_17)) {
          foreach ($db_sql_17 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // listening
        if (isset($db_sql_18)) {
          foreach ($db_sql_18 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // learning
        if (isset($db_sql_19)) {
          foreach ($db_sql_19 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // memory
        if (isset($db_sql_20)) {
          foreach ($db_sql_20 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // study
        if (isset($db_sql_21)) {
          foreach ($db_sql_21 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // creating and thinking
        if (isset($db_sql_22)) {
          foreach ($db_sql_22 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // motivation
        if (isset($db_sql_23)) {
          foreach ($db_sql_23 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // self esteem
        if (isset($db_sql_24)) {
          foreach ($db_sql_24 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // personal relationship
        if (isset($db_sql_25)) {
          foreach ($db_sql_25 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // conflict
        if (isset($db_sql_26)) {
          foreach ($db_sql_26 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }
      
        // health
        if (isset($db_sql_27)) {
          foreach ($db_sql_27 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // time management
        if (isset($db_sql_28)) {
          foreach ($db_sql_28 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // money management
        if (isset($db_sql_29)) {
          foreach ($db_sql_29 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // personal purpose
        if (isset($db_sql_30)) {
          foreach ($db_sql_30 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // career planning
        if (isset($db_sql_31)) {
          foreach ($db_sql_31 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // support resources
        if (isset($db_sql_32)) {
          foreach ($db_sql_32 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // vocabulary
        if (isset($db_sql_33)) {
          foreach ($db_sql_33 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // computation
        if (isset($db_sql_34)) {
          foreach ($db_sql_34 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // spatial
        if (isset($db_sql_35)) {
          foreach ($db_sql_35 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // word comparison
        if (isset($db_sql_36)) {
          foreach ($db_sql_36 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // making marks part 1
        if (isset($db_sql_37)) {
          foreach ($db_sql_37 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // making marks part 2
        if (isset($db_sql_38)) {
          foreach ($db_sql_38 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // baron eq
        if (isset($db_sql_39)) {
          foreach ($db_sql_39 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // keirsey
        if (isset($db_sql_40)) {
          foreach ($db_sql_40 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // aptitude  j and c 1
        if (isset($db_sql_41)) {
          foreach ($db_sql_41 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // esa
        if (isset($db_sql_42)) {
          foreach ($db_sql_42 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // aptitude verbal and numerical
        if (isset($db_sql_43)) {
          foreach ($db_sql_43 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // aptitude j and c 2
        if (isset($db_sql_44)) {
          foreach ($db_sql_44 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // aptitude j and c 3
        if (isset($db_sql_45)) {
          foreach ($db_sql_45 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // aptitude j and c 4
        if (isset($db_sql_46)) {
          foreach ($db_sql_46 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // examinee
        if (isset($db_sql_47)) {
          foreach ($db_sql_47 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // examinee answer
        if (isset($db_sql_48)) {
          foreach ($db_sql_48 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // academic settings
        if (isset($db_sql_49)) {
          foreach ($db_sql_49 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // examinee answer v2
        if (isset($db_sql_50)) {
          foreach ($db_sql_50 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        // exam attempts
        if (isset($db_sql_51)) {
          foreach ($db_sql_51 as $sql) {
            $conn->query($sql);
            if ($conn->error) {
              die($conn->error);
            }
          }
        }

        $update_env_vars = $__DotEnvironment->update_env_variables($_POST);
        if($update_env_vars){
          echo "<script>location.href = './?step=4'</script>";
          exit;
        }
      }else{
        $error = 'Database has failed to create due to some error occurred.';
      }
      $conn->close();
    }
  }

}
?>
<div class="container-fluid py-0">
  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
    <div class="card rounded-0">
      <div class="card-header rounded-0">
        <div class="card-title"><b>Site Installation (Step 3 out of 4)</b></div>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <h4 class="text-center"><b>Database Credentials</b></h4>
          <hr>
          <p>Please fill all the required fields below.</p>
          <?php if(isset($error) && !empty($error)): ?>
            <div class="alert alert-danger">
              <?= $error ?>
            </div>
          <?php endif; ?>
          <form id="installation-form" action="" method="POST">
            <div class="mb-3">
              <label for="DB_HOST">Database Host<span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="DB_HOST" value="<?= isset($_POST['DB_HOST']) ? $_POST['DB_HOST'] : "localhost" ?>" name="DB_HOST" required="required">
            </div>
            <div class="mb-3">
              <label for="DB_USERNAME">Database Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="DB_USERNAME" value="<?= isset($_POST['DB_USERNAME']) ? $_POST['DB_USERNAME'] : "" ?>" name="DB_USERNAME" required="required">
            </div>
            <div class="mb-3">
              <label for="DB_PASSWORD">Database Password</label>
              <input type="password" class="form-control rounded-0" id="DB_PASSWORD" name="DB_PASSWORD">
            </div>
            <div class="mb-3">
              <label for="DB_NAME">Database Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="DB_NAME" name="DB_NAME" required="required"   value="<?= isset($_POST['DB_NAME']) ? $_POST['DB_NAME'] : "" ?>">
            </div>
          </form>
        </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary w-50" type="submit" form="installation-form">Next</button>
      </div>
    </div>
  </div>
</div>
