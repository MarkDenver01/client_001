$(document).on('click', '#submitExamResultFrm', function() {
    var student_id = $('#student_id').val();
    var exam_type = $('#exam_type').val();
    var exam_id = $('#exam_id').val();
    var exam_title = $('#exam_title').val();
    var exam_desc = $('#exam_desc').val();
    var exam_result_status = $('#exam_result_status').val();
    var total_score = $('#total_score').val();
    var exam_answers = $('#exam_answer').val();
    var total_answer = $('#total_answer').val();
    var start_date = $('#start_date').val();
    Swal.fire({
        title: 'Do you want to counseling?',
        text: 'Click yes to proceed on counseling OR no for interpretation result',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "../app/ajax/exam_submit_result_ajax.php",
                dataType: "json",
                data: {
                    student_id:student_id,
                    exam_type:exam_type,
                    exam_id:exam_id,
                    exam_title:exam_title,
                    exam_desc:exam_desc,
                    exam_result_status:exam_result_status,
                    total_score:total_score,
                    exam_answers: exam_answers,
                    total_answer:total_answer,
                    start_date:start_date
                },
                cache: false,
                success: function(data) {
                    if (data.res == "success") {
                        window.location.href="../app/counseling.php?student_id="+student_id;
                    } else  if(data.res == "failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occur',
                            'error'
                        )
                    }
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: "../app/ajax/exam_submit_result_ajax.php",
                dataType: "json",
                data: {
                    student_id:student_id,
                    exam_type:exam_type,
                    exam_id:exam_id,
                    exam_title:exam_title,
                    exam_desc:exam_desc,
                    exam_result_status:exam_result_status,
                    total_score:total_score,
                    exam_answers: exam_answers,
                    total_answer:total_answer,
                    start_date:start_date
                },
                cache: false,
                success: function(data) {
                    if (data.res == "success") {
                        if (exam_title == 'Student Success Kit') {
                            window.location.href="../app/student_success_kit_result.php?student_id="+student_id;
                        } else if (exam_title == 'OASIS 3') {
                            window.location.href="../app/oasis_result.php?student_id="+student_id;
                        } else if (exam_title == 'BarOn EQ-i:S') {
                            window.location.href="../app/baron_eq_interpretation.php?student_id="+student_id;
                        } else if (exam_title == 'The Keirsey Temperament Sorter') {
                            window.location.href="../app/keirsey_temp_intrepretation.php?student_id="+student_id;
                        } else if (exam_title == 'Aptitude J and C') {
                            window.location.href="../app/aptitude_j_n_c_result.php?student_id="+student_id;
                        } else if (exam_title == 'ESA') {
                            window.location.href="../app/esa_result.php?student_id="+student_id;
                        } else if (exam_title == 'Aptitude Verbal and Numerical') {
                            window.location.href="../app/aptitude_verbal_n_numerical.php?student_id="+student_id;
                        }
                    } else  if(data.res == "failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occur',
                            'error'
                        )
                    }
                }
            });
        }
    });
    return false;
});