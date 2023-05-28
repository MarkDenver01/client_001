$(document).on('submit','#submitAnswerFrm', function(){
    var main_category = $('#main_category').val();
    var examAction = $('#examAction').val();
    if (examAction != "") {
        Swal.fire({
            title: 'Time Out',
            text: 'your time is over, please click OK',
            icon: 'warning',
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK!'    
        }).then((result) => {
            if (result.value) {
                $.post("../app/ajax/submit_answer_ajax_func.php", $(this).serialize(), function(data) {                  
                    if (data.res == "alreadyTaken") {
                        Swal.fire(
                            'Already Taken',
                            'you already take this exam',
                            'error'
                        )
                    } else if(data.res == "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'your answer successfully submitted!',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            if (result.value) {
                                $('#submitAnswerFrm')[0].reset();
                                var exam_id = $('#exam_id').val();
                                var exam_type =$('#main_exam_id').val();
                                var exam_desc =$('#main_exam_desc').val();
                                var exam_title =$('#main_exam_title').val();
                                if (exam_desc == 'BarOn EQ-i:S') {
                                    window.location.href='../app/baron_exam_result.php?exam_id='+exam_id+'&exam_type='+exam_type+'&exam_desc='+exam_desc+'&exam_title='+exam_title;
                                } else {
                                    window.location.href='../app/exam_result.php?exam_id='+exam_id+'&exam_type='+exam_type+'&exam_desc='+exam_desc+'&exam_title='+exam_title;
                                }         
                            }
                        });
                    } else if (data.res == "failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occur',
                            'error'
                        )
                    } else if (data.res == "emptyField") {
                        Swal.fire(
                            'Warning',
                            'Some field is/are missing',
                            'warning'
                        )
                    } 
                }, 'json');
            }
        });
    } else {
        Swal.fire({
            title: 'Are you sure?',
            text: 'you want to submit your answer now?',
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit now!'
        }).then((result) => {
            if (result.value) {
                $.post("../app/ajax/submit_answer_ajax_func.php", $(this).serialize(), function(data) {
                    if(data.res == "alreadyExam") {
                        Swal.fire(
                            'Already taken',
                            'you already take this exam',
                            'error'
                        )
                    } else if(data.res == "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'your answer successfully submitted!',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            $('#submitAnswerFrm')[0].reset();
                            var exam_id = $('#exam_id').val();
                            var exam_type =$('#main_exam_id').val();
                            var exam_desc =$('#main_exam_desc').val();
                            var exam_title =$('#main_exam_title').val();
                            if (exam_desc == 'BarOn EQ-i:S') {
                                window.location.href='../app/baron_exam_result.php?exam_id='+exam_id+'&exam_type='+exam_type+'&exam_desc='+exam_desc+'&exam_title='+exam_title;
                            } else {
                                window.location.href='../app/exam_result.php?exam_id='+exam_id+'&exam_type='+exam_type+'&exam_desc='+exam_desc+'&exam_title='+exam_title;
                            }   
                        });
                    } else if(data.res == "failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occur ',
                            'error'
                        )
                    } else if (data.res == "emptyField") {
                        Swal.fire(
                            'Warning',
                            'Some field is/are missing',
                            'warning'
                        )
                    } 
                }, 'json');
            }
        });
    }
    return false;
  });