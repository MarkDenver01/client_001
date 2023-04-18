<?php
if (isset($_POST["button_update"])) {

}
?>
<!-- view account -->
<div class="modal fade" id="ExtralargeModal<?php echo $created['id']; ?>" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 0px;">
        <br/>
        <nav>
            <ol class="breadcrumb text-nowrap" style="font-size: 15px;">
            <li class="breadcrumb-item"><a href="#"><?php echo $created['exam_title']; ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $created['exam_description']; ?></a></li>
                <li class="breadcrumb-item active"><?php echo $created['exam_category']; ?></li>
            </ol>
        </nav>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Floating Labels Form -->
        <form class="row g-3" method="POST" action="" >
          <div class="col-md-12">
            <section class="section profile">
              <div class="row">
              <?php 
                if ($created['student_year'] == 'First Year' && $created['exam_title'] == 'Student Success Kit') { ?>
                  <div class="col-xl-6">

                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
  
                  </div>
                  <div class="col-xl-6">
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
  
                  </div>
               <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Vocabulary') { ?>
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>
               <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Computation') { ?>
 
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>                
               
                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Spatial') { ?>
   
                  <div class="col-xl-6">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-6">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>                  

                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Word Comparison') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 85</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 86</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 87</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 88</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 89</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 90</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 91</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 92</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 93</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 94</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 95</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 96</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 97</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 98</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 99</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 100</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>                 

                <?php } elseif ($created['student_year'] == 'Second Year' && $created['exam_title'] == 'BarOn EQ-i:S') { ?>

                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                  </div>                 

                <?php } elseif ($created['student_year'] == 'Third Year' && $created['exam_title'] == 'The Keirsey Temperament Sorter') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>                     
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude J and C') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   

                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'ESA') { ?>

                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                 
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude Verbal and Numerical')  { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>    

                <?php } ?>                  
             
            </div>
          </section>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="button_update" class="btn btn-primary rounded-0" value="Update Answer"></input>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>
</div>
<!-- end account-->
