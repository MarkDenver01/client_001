<?php 
 if (isset($_POST['button_submit'])) {

           
 
                // Loop through file items
                foreach($_FILES['fileUpload']['name'] as $id=>$val){
                    $img_file = $_FILES['fileUpload']['name'][$id];
                    $tmp_dir = $_FILES['fileUpload']['tmp_name'][$id];
                    $img_size = $_FILES['fileUpload']['size'][$id];
                              
                              // Velidate if files exist
                              $upload_dir = "../uploads/exam/";
                              $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
                              $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                          
                              $generate_file_name = 'EXAM_'.$student_year.'_'.rand(1000,1000000).".".$img_ext;
                                  
                    if (in_array($img_ext, $valid_extensions)) {
                   
                          if (move_uploaded_file($tmp_dir, $upload_dir.$generate_file_name)) {
                            $dir = $upload_dir.$generate_file_name;
                            $insert = $db->query("UPDATE exam_created SET image_exam_path='$dir' WHERE id='1'");
                          } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                          }
                        
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Only .jpg, .jpeg and .png file formats allowed."
                        );

                   
                }
            }
            
    }

    https://www.positronx.io/php-multiple-files-images-upload-in-mysql-database/
?>