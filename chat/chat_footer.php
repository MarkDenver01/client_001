<!-- Vendor JS Files -->
<script src="../app/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../app/assets/vendor/chart.js/chart.umd.js"></script>
<script src="../app/assets/vendor/echarts/echarts.min.js"></script>
<script src="../app/assets/vendor/quill/quill.min.js"></script>
<script src="../app/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../app/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../app/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../app/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- password visibility and invisibility -->
<script>
$(document).ready(function() {
  // new
  $("#togglePassword").click(function (e) {
    e.preventDefault();
    var newPassword = $(this).parent().parent().find(".new_password").attr("type");
    if(newPassword == "password"){
      $(this).removeClass("bi-eye-slash-fill");
      $(this).addClass("bi-eye-fill");
      $(this).parent().parent().find(".new_password").attr("type","text");
    }else if(newPassword == "text"){
      $(this).removeClass("bi-eye-fill");
      $(this).addClass("bi-eye-slash-fill");
      $(this).parent().parent().find(".new_password").attr("type","password");
    }});

    // confirm
    $("#toggleConfirmPassword").click(function (e) {
      e.preventDefault();
      var confirmPassword = $(this).parent().parent().find(".confirm_password").attr("type");
      if(confirmPassword == "password") {
        $(this).removeClass("bi-eye-slash-fill");
        $(this).addClass("bi-eye-fill");
        $(this).parent().parent().find(".confirm_password").attr("type","text");
      } else if(confirmPassword == "text") {
        $(this).removeClass("bi-eye-fill");
        $(this).addClass("bi-eye-slash-fill");
        $(this).parent().parent().find(".confirm_password").attr("type","password");
      }});

      // current
      $("#toggleCurrentPassword").click(function (e) {
        e.preventDefault();
        var currentPassword = $(this).parent().parent().find(".current_password").attr("type");
        if(currentPassword == "password") {
          $(this).removeClass("bi-eye-slash-fill");
          $(this).addClass("bi-eye-fill");
          $(this).parent().parent().find(".current_password").attr("type","text");
        } else if(currentPassword == "text") {
          $(this).removeClass("bi-eye-fill");
          $(this).addClass("bi-eye-slash-fill");
          $(this).parent().parent().find(".current_password").attr("type","password");
        }});
      });

      </script>

    </body>

    </html>
