<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>FIRST YEAR EXAMINATION PAGE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Student Success Kit & OASIS 3</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
          <div class="col-xl-12">
               <div class="card">
                 
                 <div class="card-body">
                    <h5 class="card-title">
                      REMINDER ON UPLOADING THE FILE
                    </h5>
                    <p class="small fst-italic">
                      1. Upload IMAGE file only.<br/>
                      2. Selected image could be uploaded once on below Attachment File buttons.
                    </p>

                    <!--- Bordered tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Student Success Kit</button>
                        </li>
                        <li class="nav-item">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">OASIS 3</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                         <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <br/>
                            <p class="small fst-italic">
                              The ideas and many of the questions for the Pre-Assesment survey were dericed from "Becoming a Master Student",
                              7th and 8th editions [1994 and 1998] Davis Ellis, Houghton Mifflin Co., Boston, MA.
                            </p>
                            <hr/>
                            <!-- <form action="" enctype="multipart/form-data"> -->
                                <div class="col-lg-12">
                                    <div id="msg"><?php echo isset($msg)?$msg:''; ?></div>
                                    <div class="dropzone dz-clickable" id="myDrop">
                                        <div class="dz-default dz-message" data-dz-message="">
                                          <span>Drop files here to upload</span>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="col-lg-12">
                                    <div class="row">
                                      <div class="col-lg-3"></div>
                                      <div class="col-lg-6">

                                              <label for="inputNumber" class="col-sm-5 col-form-label">Student Year</label>
                                              <div class="col-sm-10">
                                                <select name="student_year" id="student_year" class="form-select">
                                                  <option selected>Select student year</option>
                                                  <option value="First Year">First Year</option>
                                                  <option value="Second Year">Second Year</option>
                                                  <option value="Third Year">Third Year</option>
                                                  <option value="Fourth Year">Fourth Year</option>
                                                </select>
                                              </div>


                                              <label for="inputNumber" class="col-sm-5 col-form-label">Title</label>
                                              <div class="col-sm-10">
                                                  <input name="title" type="text" class="form-control">
                                              </div>

                                              <label for="inputNumber" class="col-sm-5 col-form-label">Exam Created</label>
                                              <div class="col-sm-10">
                                                  <input name="exam_created" type="date" class="form-control" >
                                              </div>
                                              <br/>
                                              <div class="text-center">
                                                  <button id="add_file" type="submit" class="btn btn-primary">Create</button>
                                                  <button type="submit" name="button_view_success_kit" class="btn btn-success">View Records</button>
                                              </div>

                                        </div>
                                      <div class="col-lg-3"></div>
                                    </div>
                                </div>
                              <!-- </form> -->
                         </div>
                         <!-- second tab here -->
                         <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <p class="small fst-italic">
                              #10135A<br/>
                              Copright 2002, 1991 by PRO-ED, Inc.<br/>
                              1 2 3 4 5 06 05 04 03 02 01
                            </p>
                            <hr/>
                            <!-- form data start here -->
                                <div class="text-left">
                                  <button type="submit" class="btn btn-primary">Upload</button>
                                  <button type="submit" name="button_oasis_records" class="btn btn-success">View OASIS Records</button>
                                </div>
                            <!-- form data end here -->
                         </div>
                         <!-- end of second tab -->

                    </div>

                    <!--- end border tabs -->

                 </div>

               </div>
          </div>
      </div>
  </section>

  </main><!-- End #main -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="../app/dropzone/dropzone.js"></script>
  <script>
    //Dropzone script
	  Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#myDrop", {
      paramName: "files",
      addRemoveLinks: true,
      uploadMultiple: true,
      autoProcessQueue: false,
      parallelUploads: 50,
      maxFilesize: 30,
      acceptedFiles: ".png, .jpeg, .jpg, .gif",
      url: "../includes/image_uploader.php",
    });

    // add file script
    myDropzone.on("success", function(file, message) {
      $("#msg").html(message);
      //setTimeout(function() { window.location.href = "../app/create_exam_first.php"}, 800);
    });

    myDropzone.on("error", function(data) {
      $("#msg").html('<div class="alert alert-danger">There is something wrong, please try again!</div>');
    });

    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
    });

    $("#add_file").on("click", function() {
      myDropzone.processQueue();
    });
  </script>

<?php include('../footer.php'); ?>
