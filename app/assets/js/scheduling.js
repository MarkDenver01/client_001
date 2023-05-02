$(document).on("click", "#schedule", function() {
    var thisId = $(this).data('id');
    Swal.fire({
        title: 'Guidance Prior Action',
        text: 'Would you like to monitor or notify the student? Click YES if monitor then NO if notify and retake the exam of the student',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if(result.value) {
            $.ajax({
                type: "post",
                url: "./ajax/monitor_ajax_func",
                dataType: "json",
                data: {thisId:thisId},
                cache: false,
                success: function(data) {
                    if (data.res == "success") {
                        Swal.fire(
                            'Success',
                            'This student is under monitoring until the end of semester.',
                            'success'
                        )
                    } else if(data.res =="failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occured during the operation. Please try again!',
                            'error'
                        )
                    }
                },
                error: function(xhr, ErrorStatus, error) {
                    console.log(status.error);
                }
            });
        } else if(result.dismiss == 'cancel'){
            $.ajax({
                type: "post",
                url: "./ajax/notify_ajax_func",
                dataType: "json",
                data: {thisId:thisId},
                cache: false,
                success: function(data) {
                    if (data.res == "success") {
                        Swal.fire(
                            'Success',
                            'Notification has sent to this student and can now retake the exam',
                            'success'
                        )
                    } else if(data.res == "failed") {
                        Swal.fire(
                            'Error',
                            'Unexpected error occured during the operation. Please try again!',
                            'error'
                        )
                    } else if(data.res == "appointment") {
                        Swal.fire(
                            'Warning',
                            'Student doesnt set an apppointment yet!',
                            'warning'
                        )
                    }
                },
                error: function(xhr, ErrorStatus, error) {
                    console.log(status.error);
                }
            });
        }
    });
    return false;
});