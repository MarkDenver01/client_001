<?php $con = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php
if (isset($_POST["button_update"])) {
  
  if ($created['exam_category'] == 'Reading') { 
    $sql ="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO reading (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Writing') {
    $sql ="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO writing (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Speaking Skills') {
    $sql ="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO speaking_skills (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Listening Skills') {
    $sql ="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO listening_skills (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Learning Styles') {
    $sql ="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO learning_styles (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Memory') {
    $sql ="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO memory (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Study Skills') {
    $sql ="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO study_skills (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Creative and Critical Thinking Skills') {
    $sql ="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO creative_and_thinking (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Motivation') {
    $sql ="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO motivation (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Self-Esteem') {
    $sql ="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO self_esteem (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Personal Relationships') {
    $sql ="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO personal_relationship (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Conflict Resolution') {
    $sql ="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO conflict_resolutions (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Health') {
    $sql ="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO health (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Time Management') {
    $sql ="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO time_management (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Money Management') {
    $sql ="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO money_management (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Personal Purpose') {
    $sql ="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO personal_purpose (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Career Planning') {
    $sql ="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO career_planning (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_category'] == 'Support Resources') {
    $sql ="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_1']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_2']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_3']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_4']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_5']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_6']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_7']. "');";
    $sql .="INSERT INTO support_resources (correct_items) VALUES('" .$_POST['s_item_no_8']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Vocabulary') {
    $sql ="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_1']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_2']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_3']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_4']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_5']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_6']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_7']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_8']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_9']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_10']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_11']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_12']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_13']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_14']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_15']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_16']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_17']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_18']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_19']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_20']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_21']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_22']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_23']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_24']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_25']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_26']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_27']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_28']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_29']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_30']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_31']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_32']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_33']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_34']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_35']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_36']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_37']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_38']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_39']. "');";
    $sql .="INSERT INTO vocabulary (correct_items) VALUES('" .$_POST['v_item_no_40']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Computation') {
    $sql ="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_1']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_2']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_3']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_4']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_5']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_6']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_7']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_8']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_9']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_10']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_11']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_12']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_13']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_14']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_15']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_16']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_17']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_18']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_19']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_20']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_21']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_22']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_23']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_24']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_25']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_26']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_27']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_28']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_29']. "');";
    $sql .="INSERT INTO computation (correct_items) VALUES('" .$_POST['c_item_no_30']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Spatial') {
    $sql ="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_1']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_2']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_3']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_4']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_5']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_6']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_7']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_8']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_9']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_10']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_11']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_12']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_13']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_14']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_15']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_16']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_17']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_18']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_19']. "');";
    $sql .="INSERT INTO spatial (correct_items) VALUES('" .$_POST['sp_item_no_20']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Word Comparison') {
    $sql ="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_1']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_2']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_3']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_4']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_5']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_6']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_7']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_8']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_9']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_10']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_11']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_12']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_13']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_14']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_15']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_16']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_17']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_18']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_19']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_20']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_21']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_22']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_23']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_24']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_25']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_26']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_27']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_28']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_29']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_30']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_31']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_32']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_33']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_34']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_35']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_36']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_37']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_38']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_39']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_40']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_41']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_42']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_43']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_44']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_45']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_46']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_47']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_48']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_49']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_50']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_51']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_52']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_53']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_54']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_55']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_56']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_57']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_58']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_59']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_60']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_61']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_62']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_63']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_64']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_65']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_66']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_67']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_68']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_69']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_70']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_71']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_72']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_73']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_74']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_75']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_76']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_77']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_78']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_79']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_80']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_81']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_82']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_83']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_84']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_85']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_86']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_87']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_88']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_89']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_90']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_91']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_92']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_93']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_94']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_95']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_96']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_97']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_98']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_99']. "');";
    $sql .="INSERT INTO work_comparison (correct_items) VALUES('" .$_POST['w_item_no_100']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'BarOn EQ-i:S') {
    $sql ="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_1']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_2']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_3']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_4']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_5']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_6']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_7']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_8']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_9']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_10']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_11']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_12']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_13']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_14']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_15']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_16']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_17']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_18']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_19']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_20']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_21']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_22']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_23']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_24']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_25']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_26']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_27']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_28']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_29']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_30']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_31']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_32']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_33']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_34']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_35']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_36']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_37']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_38']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_39']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_40']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_41']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_42']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_43']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_44']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_45']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_46']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_47']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_48']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_49']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_50']. "');";
    $sql .="INSERT INTO baron_eq (correct_items) VALUES('" .$_POST['b_item_no_51']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'The Keirsey Temerament Sorter') {
    $sql ="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_1']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_2']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_3']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_4']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_5']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_6']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_7']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_8']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_9']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_10']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_11']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_12']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_13']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_14']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_15']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_16']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_17']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_18']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_19']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_20']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_21']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_22']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_23']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_24']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_25']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_26']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_27']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_28']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_29']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_30']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_31']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_32']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_33']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_34']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_35']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_36']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_37']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_38']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_39']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_40']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_41']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_42']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_43']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_44']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_45']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_46']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_47']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_48']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_49']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_50']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_51']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_52']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_53']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_54']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_55']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_56']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_57']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_58']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_59']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_60']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_61']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_62']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_63']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_64']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_65']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_66']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_67']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_68']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_69']. "');";
    $sql .="INSERT INTO keirsey_temerament_sorter (correct_items) VALUES('" .$_POST['k_item_no_70']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Aptitude J and C') {
    $sql ="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_1']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_2']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_3']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_4']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_5']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_1 (correct_items) VALUES('" .$_POST['ajc_1_item_no_6']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_1']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_2']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_3']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_4']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_5']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_6']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_2 (correct_items) VALUES('" .$_POST['ajc_2_item_no_7']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_1']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_2']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_3']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_4']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_5']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_6']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_3 (correct_items) VALUES('" .$_POST['ajc_3_item_no_7']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_1']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_2']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_3']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_4']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_5']. "');";
    $sql .="INSERT INTO aptitude_j_and_c_4 (correct_items) VALUES('" .$_POST['ajc_4_item_no_6']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'ESA') {
    $sql ="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_1']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_2']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_3']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_4']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_5']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_6']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_7']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_8']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_9']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_10']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_11']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_12']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_13']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_14']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_15']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_16']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_17']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_18']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_19']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_20']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_21']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_22']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_23']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_24']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_25']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_26']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_27']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_28']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_29']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_30']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_31']. "');";
    $sql .="INSERT INTO esa (correct_items) VALUES('" .$_POST['e_item_no_32']. "');";
    $con->multi_query($sql); 
   } elseif ($created['exam_description'] == 'Aptitude Verbal and Numerical') {
    $sql ="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_1']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_2']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_3']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_4']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_5']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_6']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_7']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_8']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_9']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_10']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_11']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_12']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_13']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_14']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_15']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_16']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_17']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_18']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_19']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_20']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_21']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_22']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_23']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_24']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_25']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_26']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_27']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_28']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_29']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_30']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_31']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_32']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_33']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_34']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_35']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_36']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_37']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_38']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_39']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_40']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_41']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_42']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_43']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_44']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_45']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_46']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_47']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_48']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_49']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_50']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_51']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_52']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_53']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_54']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_55']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_56']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_57']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_58']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_59']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_60']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_61']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_62']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_63']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_64']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_65']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_66']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_67']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_68']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_69']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_70']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_71']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_72']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_73']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_74']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_75']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_76']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_77']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_78']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_79']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_80']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_81']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_82']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_83']. "');";
    $sql .="INSERT INTO aptitude_verbal_and_numerical (correct_items) VALUES('" .$_POST['av_item_no_84']. "');";
    $con->multi_query($sql); 
   }
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
                          <input name="s_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
  
                  </div>
                  <div class="col-xl-6">
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="s_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
  
                  </div>
               <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Vocabulary') { ?>
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>
                  <div class="col-xl-3">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_33" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_34" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_35" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_36" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_37" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_38" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_39" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="v_item_no_40" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>
               <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Computation') { ?>
 
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="c_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>                
               
                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Spatial') { ?>
   
                  <div class="col-xl-6">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-6">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sp_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>                  

                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Word Comparison') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_33" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_34" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_35" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_36" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_37" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_38" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_39" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_40" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_41" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_42" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_43" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_44" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_45" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_46" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_47" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_48" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_49" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_50" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_51" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_52" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_53" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_54" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_55" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_56" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_57" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_58" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_59" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_60" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_61" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_62" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_63" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_64" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_65" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_66" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_67" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_68" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_69" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_70" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_71" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_72" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_73" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_74" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_75" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_76" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_77" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_78" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_79" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_80" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_81" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_82" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_83" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_84" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 85</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_85" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 86</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_86" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 87</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_87" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 88</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_88" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 89</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_89" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 90</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_90" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 91</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_91" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 92</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_92" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 93</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_93" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 94</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_94" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 95</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_95" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 96</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_96" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 97</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_97" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 98</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_98" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 99</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_99" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 100</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="w_item_no_100" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>                 

                <?php } elseif ($created['student_year'] == 'Second Year' && $created['exam_title'] == 'BarOn EQ-i:S') { ?>

                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_33" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_34" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_35" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_36" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_37" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_38" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_39" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_40" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_41" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_42" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_43" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_44" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_45" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_46" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_47" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_48" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_49" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_50" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="b_item_no_51" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                  </div>                 

                <?php } elseif ($created['student_year'] == 'Third Year' && $created['exam_title'] == 'The Keirsey Temperament Sorter') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_33" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_34" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_35" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_36" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_37" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_38" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_39" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_40" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_41" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_42" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_43" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_44" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_45" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_46" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_47" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_48" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_49" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_50" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_51" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_52" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_53" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_54" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_55" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_56" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_57" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_58" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_59" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_60" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_61" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_62" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_63" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_64" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_65" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_66" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_67" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_68" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_69" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="k_item_no_70" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>                     
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude J and C') { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_1_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_2_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_3_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ajc_4_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   

                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'ESA') { ?>

                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>   
                 
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude Verbal and Numerical')  { ?>

                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_1" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_2" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_3" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_4" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_5" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_6" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_7" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_8" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_9" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_10" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_11" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_12" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_13" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_14" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_15" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_16" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_17" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_18" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_19" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_20" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_21" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_22" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_23" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_24" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_25" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_26" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_27" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_28" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_29" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_30" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_31" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_32" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_33" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_34" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_35" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_36" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_37" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_38" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_39" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_40" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_41" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_42" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_43" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_44" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_45" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_46" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_47" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_48" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_49" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_50" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_51" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_52" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_53" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_54" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_55" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_56" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_57" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_58" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_59" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_60" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_61" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_62" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_63" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_64" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_65" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_66" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_67" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_68" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_69" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_70" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_71" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_72" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_73" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_74" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_75" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_76" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_77" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_78" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_79" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_80" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_81" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_82" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_83" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="av_item_no_84" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $info['email_address']; ?>" >
                      </div>

                  </div>    

                <?php } ?>                  
             
            </div>
          </section>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="button_update" class="btn btn-primary rounded-pill" value="Update Answer"></input>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>
</div>
<!-- end account-->
