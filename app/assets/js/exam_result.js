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
                        window.location.href="../app/baron_eq_interpretation.php?student_id="+student_id;
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