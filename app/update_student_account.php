<?php
if (isset($_POST["button_update"])) {
    update_student_account("full_name",
      "email_address",
      "course",
      "student_year",
      "semester",
      "school_year",
      "gender",
      "age",
      "birth_date",
      "present_address"
    );
}
?>
<!-- view account -->
<div class="modal fade" id="ExtralargeModal<?php echo $student['id']; ?>" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Floating Labels Form -->
        <form class="row g-3" method="POST" action="" >
          <div class="col-md-12">
            <section class="section profile">
              <div class="row">
              <div class="col-xl-12">

                <div class="card rounded-0">
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
                            <input name="full_name" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $student['name']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email_address" type="email" class="form-control rounded-0" id="fullName" value="<?php echo $student['email_address']; ?>" >
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Course</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="course" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $student['course']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="year" class="col-md-4 col-lg-3 col-form-label">Year</label>
                            <div class="col-md-4 col-lg-4">
                              <select name="student_year" id="inputState" class="form-select rounded-0">
                                <option selected><?php echo $student['student_year']; ?></option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Semester" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                          <div class="col-md-4 col-lg-4">
                            <select name="semester" id="inputState" class="form-select rounded-0">
                              <option selected><?php echo $student['semester']; ?></option>
                              <option value="First semester">First semester</option>
                              <option value="Second semester">Second semester</option>
                              <option value="Summer">Summer</option>
                              </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="school_year_start" class="col-md-4 col-lg-3 col-form-label">Academic School Year</label>
                            <div class="col-md-5 col-lg-2">
                              <input name="school_year" type="text" class="form-control rounded-0 text-danger" id="school_year_start" value="<?php echo $student['school_year']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-3 col-lg-3 col-form-label">Age</label>
                          <div class="col-md-4 col-lg-1">
                            <input name="age" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $student['age']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="gender" id="inputState" class="form-select rounded-0">
                              <option selected><?php echo $student['gender']; ?></option>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="birth_date" class="col-md-4 col-lg-3 col-form-label">Birth date</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="birth_date" type="date" class="form-control rounded-0" id="birth_date" value="<?php echo $student['birth_date']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="present_address" class="form-control rounded-0" id="about" style="height: 100px"><?php echo $student['present_address']; ?></textarea>
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
        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="button_update" class="btn btn-primary rounded-0" value="Update Account"></input>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>
</div>
<!-- end account-->
