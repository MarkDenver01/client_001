<?php include('../include/load.php'); ?>
<?php
  
?>
<!-- view account -->
<div class="modal fade" id="insert_student" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Student Account Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <!-- Floating Labels Form -->
        <form class="row g-3">
          <div class="col-md-12">
            <section class="section profile">
              <div class="row">
                <div class="col-xl-4">

                  <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                      <img src="./assets/img/profile.png" alt="Profile" class="rounded-circle">
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
                        <span class="nav-link active" data-bs-toggle="tab" >Edit Account Information</span>
                      </li>
                    </ul>
                    <div class="tab-content pt-2">
                      <br/>
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="Denver Gregorio">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Year</label>
                          <div class="col-md-8 col-lg-9">
                            <select id="inputState" class="form-select">
                              <option selected>First Year</option>
                              <option value="1">First year</option>
                              <option value="2">Second Year</option>
                              <option value="3">Third Year</option>
                              <option value="4">Fourth Year</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Course</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="Bachelor of Science in Information Technology">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="email" class="form-control" id="fullName" value="gregoriomarkdenver01@gmail.com">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="P@ssw0rd001!">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-3 col-lg-3 col-form-label">Age</label>
                          <div class="col-md-4 col-lg-2">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="31">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                          <div class="col-md-8 col-lg-9">
                            <select id="inputState" class="form-select">
                              <option selected>Female</option>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
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
        <input type="button" name="btnRegister" class="btn btn-primary" value="Register"></input>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>
</div>
<!-- end account-->
