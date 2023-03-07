<!-- view account -->
<div class="modal fade" id="ExtralargeModal<?php echo $student['id']; ?>" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Stundet Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Floating Labels Form -->
        <form class="row g-3" method="POST" action="" >
          <div class="col-md-12">
            <section class="section profile">
              <div class="row">
                <div class="col-xl-4">

                  <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                      <?php
                        $check_image = $student['image'];
                        $image_file_data = "";
                        if ($check_image != NUll) {

                          $image_file_data = "./uploads/users".$check_image;
                        } else {
                          $image_file_data = "./assets/img/profile.png";
                        }
                      ?>
                      <img src="<?php echo $image_file_data; ?>" alt="Profile" class="rounded-circle">
                    </br>
                    <input type="file" class="form-control btn btn-primary rounded-pill btn-sm"></input>
                  </div>
                </div>

              </div>

              <div class="col-xl-8">

                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                      <li class="nav-item">
                        <span class="nav-link active" data-bs-toggle="tab" >Edit Student Information</span>
                      </li>
                    </ul>
                    <div class="tab-content pt-2">
                      <br/>
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $student['name']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="fullName" value="<?php echo $student['email_address']; ?>" disabled>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Course</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="course" type="text" class="form-control" id="fullName" value="<?php echo $student['course']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Year</label>
                          <div class="col-md-4 col-lg-2">
                            <input name="student_year" type="text" class="form-control" id="fullName" value="<?php echo $student['student_year']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-3 col-lg-3 col-form-label">Age</label>
                          <div class="col-md-4 col-lg-2">
                            <input name="age" type="text" class="form-control" id="fullName" value="<?php echo $student['age']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="gender" id="inputState" class="form-select">
                              <option selected><?php echo $student['gender']; ?></option>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="address" class="form-control" id="about" style="height: 100px"><?php echo $student['present_address']; ?></textarea>
                          </div>
                        </div>

                      </div>

                    </div><!-- End Bordered Tabs -->

                  </div>
                </div>

              </div>
            </div>
          </section>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="button" name="submit" class="btn btn-primary" value="Edit Account"></input>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>
</div>
<!-- end account-->
