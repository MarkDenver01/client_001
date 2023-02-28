<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php onClickButton("button_create", "./register_student_account"); ?>
<?php include('../start_menu_bar.php'); ?>



<main id="main" class="main">
  <div class="pagetitle">
    <h1>Student Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Profiling</a></li>
        <li class="breadcrumb-item active">View student information</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="row">
      <!-- start create account -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Student & Account information</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-6">
              <label for="yourUsername" class="form-label">Search email address</label>
              <div class="input-group has-validation">
                <input type="text" name="username" class="form-control" id="yourUsername">
                <hr/>
                <span class="input-group-text">
                  <i class="bx bx-search-alt-2" id="toggleCurrentPassword" style="cursor: pointer"></i>
                </span>
              </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Address</th>
                        <th scope="col">Year</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Denver Gregorio</td>
                        <td>31</td>
                        <td>Male</td>
                        <td>1991-12-31</td>
                        <td>Tanauan City, Batangas</td>
                        <td>4th Year</td>
                        <td>B.S. Information Technology</td>
                        <td>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#update_account">Update</button>
                          <button type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Denver Gregorio</td>
                        <td>31</td>
                        <td>Male</td>
                        <td>1991-12-31</td>
                        <td>Tanauan City, Batangas</td>
                        <td>4th Year</td>
                        <td>B.S. Information Technology</td>
                        <td>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm">Update</button>
                          <button type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Denver Gregorio</td>
                        <td>31</td>
                        <td>Male</td>
                        <td>1991-12-31</td>
                        <td>Tanauan City, Batangas</td>
                        <td>4th Year</td>
                        <td>B.S. Information Technology</td>
                        <td>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm">Update</button>
                          <button type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Denver Gregorio</td>
                        <td>31</td>
                        <td>Male</td>
                        <td>1991-12-31</td>
                        <td>Tanauan City, Batangas</td>
                        <td>4th Year</td>
                        <td>B.S. Information Technology</td>
                        <td>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm">Update</button>
                          <button type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Denver Gregorio</td>
                        <td>31</td>
                        <td>Male</td>
                        <td>1991-12-31</td>
                        <td>Tanauan City, Batangas</td>
                        <td>4th Year</td>
                        <td>B.S. Information Technology</td>
                        <td>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm">Update</button>
                          <button type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->

                </div>
              </div>


            </div>

            <div class="text-center">
              <button type="submit" name="button_create" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#insert_student" >Create new account</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>

<?php include('../footer.php'); ?>
