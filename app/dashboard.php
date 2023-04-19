<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
   <?php if (isset($_SESSION['key_session']['user_level']) && ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2')) { ?>
    <div class="row">

<!-- Left side columns -->
<div class="col-lg-8">
  <div class="row">

    <!-- Counseling Card -->
    <div class="col-xxl-6 col-md-6">
      <div class="card info-card customers-card rounded-0">
        <div class="card-body">
          <h5 class="card-title">Counseling <span>| cases</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-hammer-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Counseling Card -->

    <!-- Students Card -->
    <div class="col-xxl-6 col-md-6">
      <div class="card info-card customers-card rounded-0">
        <?php global $db; ?>
        <?php 
          $sql = "SELECT count(*) as total FROM student_info";
          $result = $db->query($sql);
          $read = mysqli_fetch_assoc($result);
          $read_avg = $read['total'] * 2 / 5;
        ?>
        <div class="card-body ">
          <h5 class="card-title">Students <span>| on Record</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-fill"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $read['total']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $read_avg.'%'; ?></span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Students Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card customers-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->


              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

<div class="card info-card revenue-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">

<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card customers-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

<div class="card info-card revenue-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">

<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

    <!-- Reports -->
    <div class="col-12">
      <div class="card rounded-0">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Summary <span>/Report</span></h5>

          <!-- Line Chart -->
          <div id="reportsChart"></div>

          <script>
          document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
              series: [{
                name: 'Counseling',
                data: [31, 40, 28, 51, 42, 82, 56],
              }, {
                name: 'Student',
                data: [11, 32, 45, 32, 34, 52, 41]
              },{
                name: 'Excuse',
                data: [11, 32, 45, 32, 34, 52, 41]
              }, {
                name: 'Visits',
                data: [11, 32, 45, 32, 34, 52, 41]
              },  {
                name: 'Clearance',
                data: [15, 11, 32, 18, 9, 24, 11]
              }],
              chart: {
                height: 350,
                type: 'area',
                toolbar: {
                  show: false
                },
              },
              markers: {
                size: 4
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d', "#6a1b9a", "#f50057"],
              fill: {
                type: "gradient",
                gradient: {
                  shadeIntensity: 1,
                  opacityFrom: 0.3,
                  opacityTo: 0.4,
                  stops: [0, 90, 100]
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'smooth',
                width: 2
              },
              xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
          </script>
          <!-- End Line Chart -->

        </div>

      </div>
    </div><!-- End Reports -->

  </div>
</div><!-- End Left side columns -->
   <?php } else { ?>

    <div class="row">

<!-- Left side columns -->
<div class="col-lg-8">
  <div class="row">
    <!-- Students Card -->
    <div class="col-xxl-12 col-md-12">
      <div class="card info-card customers-card rounded-0">
        <?php global $db; ?>
        <?php 
          $sql = "SELECT count(*) as total FROM student_info";
          $result = $db->query($sql);
          $read = mysqli_fetch_assoc($result);
          $read_avg = $read['total'] * 2 / 5;
        ?>
        <div class="card-body ">
          <h5 class="card-title">Exam Result <span>| status</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $read['total']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $read_avg.'%'; ?></span> <span class="text-muted small pt-2 ps-1">FAILED</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Students Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-12 col-md-12">

      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Notification <span>| from Guidance Counselor</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-muted small pt-2 ps-1">Notification</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->


    <!-- Reports -->
    <div class="col-12">
      <div class="card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Student Exam Summary <span>/Result</span></h5>

           <!-- Pie Chart -->
           <div id="pieChart" style="min-height: 400px;" class="echart"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    echarts.init(document.querySelector("#pieChart")).setOption({
      title: {
        text: 'Student Success Kit',
        subtext: 'Academic Skills Development',
        left: 'center'
      },
      tooltip: {
        trigger: 'item'
      },
      legend: {
        orient: 'vertical',
        left: 'left'
      },
      series: [{
        name: 'Access From',
        type: 'pie',
        radius: '50%',
        data: [{
            value: 1048,
            name: 'Reading'
          },
          {
            value: 735,
            name: 'Writing'
          },
          {
            value: 580,
            name: 'Speaking'
          },
          {
            value: 484,
            name: 'Listening'
          }
        ],
        emphasis: {
          itemStyle: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
          }
        }
      }]
    });
  });
</script>
<!-- End Pie Chart -->

          
        </div>

      </div>
    </div><!-- End Reports -->

    

  </div>
</div><!-- End Left side columns -->

    <?php } ?>

      <!-- Right side columns -->
          

<?php include('../end_menu_bar.php'); ?>
<?php include('../footer.php'); ?>
