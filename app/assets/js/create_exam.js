$(document).on("click","#created_exam", function() {
    Swal.fire({
        title: 'Would you like to updload an exam',
        text: 'Click Manual Upload if you want to manually upload the exam or Click Bulk Upload if you want to upload the exam at once',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Manual Upload',
        cancelButtonText: 'Bulk Upload'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Manual Upload',
                text: 'You can now upload the exam manually!',
                icon: 'success',
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK!'
            }).then((result) => {
                window.location.href='../app/create_exam';
            });
        } else if(result.dismiss == 'cancel') {
            Swal.fire({
                title: 'Exam Type Selection',
                input: 'select',
                inputOptions: {
                  'student_success_kit': 'Student Success Kit',
                  'oasis_3': 'OASIS 3',
                  'bar_on': 'BarOn EQ-i:S',
                  'keirsey': 'The Keirsey Temperament Sorter',
                  'aptitude_j_n_c': 'Aptitude J and C',
                  'esa': 'ESA',
                  'aptitude_v_n_n': 'Aptitude Verbal and Numerical'
                },
                inputPlaceholder: 'Select exam type',
                showCancelButton: true,
                inputValidator: (value) => {
                  return new Promise((resolve) => {
                    var thisExamType = value;
                    if (value === 'student_success_kit') {
                        Swal.fire({
                            title: 'Student Success Kit',
                            text: 'Please proceed on uploading the exam.',
                            icon: 'success',
                            data: {thisExamType:thisExamType},
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        });
                       
                    } else if (value === 'oasis_3') {
                        Swal.fire({
                            title: 'OASIS 3',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        });
                    } else if (value === 'bar_on') {
                        Swal.fire({
                            title: 'BarOn EQ-i:S',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        });
                    } else if (value === 'keirsey') {
                        Swal.fire({
                            title: 'The Keirsey Temperament Sorter',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        });
                    } else if (value === 'aptitude_j_n_c') {
                        Swal.fire({
                            title: 'Aptitude J and C',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        });
                    } else if (value === 'esa') {
                        Swal.fire({
                            title: 'ESA',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        }); 
                    } else if (value === 'aptitude_v_n_n') {
                        Swal.fire({
                            title: 'Aptitude Verbal and Numerical',
                            text: 'You can now upload all exam at once',
                            icon: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        }).then((result) =>{
                            window.location.href='../app/created_exam_bulk?exam_type='+value;
                        }); 
                    } else {
                      resolve('Please select the exam type)')
                    }
                  });
                }
              });
        }
    });
    return false;
});


$(document).on("click",".swal2-container input[name='swal2-radio']", function() {
	var id = $('input[name=swal2-radio]:checked').val();
	console.log('id: ' + id);
});