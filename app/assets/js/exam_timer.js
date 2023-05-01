// Submit Answer
$(document).on('submit', '#submitAnswerFrm', function(){
    var examAction = $('#examAction').val();
    if(examAction != "") {
    Swal.fire({
        title: 'Time Out',
        text: "Your time is over, please click ok",
        icon: 'warning',
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK!'
    }).then((result) => {
    if (result.value) {
        $.post("../app/ajax/submit_answer_ajax_func.php", $(this).serialize(), function(data){
        if(data.res == "alreadyTaken") {
            Swal.fire(
            'Already Taken',
            "you already take this exam",
            'error'
            ) 
        } else if(data.res == "success") {
            Swal.fire({
              title: 'Success',
              text: "your answer successfully submitted!",
              icon: 'success',
              allowOutsideClick: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK!'
            }).then((result) => {
            if (result.value) {
                $('#submitAnswerFrm')[0].reset();
                var exam_id = $('#exam_id').val();
                window.location.href='home.php?page=result&id=' + exam_id;
            }
            });
        } else if(data.res == "failed") {
            Swal.fire(
                'Error',
                "Something;s went wrong",
                'error'
            ) 
        }
     },'json');
  }
});
} else {
    Swal.fire({
      title: 'Are you sure?',
      text: "you want to submit your answer now?",
      icon: 'warning',
      showCancelButton: true,
      allowOutsideClick: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, submit now!'
  }).then((result) => {
    if (result.value) {
    
        $.post("../app/ajax/submit_answer_ajax_func.php", $(this).serialize(), function(data){
            if(data.res == "alreadyTaken") {
               Swal.fire(
                 'Already Taken',
                 "you already take this exam",
                 'error'
               ) 
            } else if(data.res == "success") {
                Swal.fire({
                    title: 'Success',
                    text: "your answer successfully submitted!",
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK!'
                }).then((result) => {
                    if (result.value) {
                        $('#submitAnswerFrm')[0].reset();
                        var exam_id = $('#exam_id').val();
                        window.location.href='home.php?page=result&id=' + exam_id;
                    }
                });
            } else if(data.res == "failed") {
                Swal.fire(
                    'Error',
                    "Something;s went wrong",
                    'error'
                ) 
            } 
        },'json');
    }
  });
}
  return false;
});
  