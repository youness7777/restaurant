<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
              <div class="col-sm-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Users</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">{{$countforadmin}}</h2>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account text-primary ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Chefs</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">{{$countforchef}}</h2>
                      
        <p class="text-success ms-2 mb-0 font-weight-medium">
       
        </p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-chef-hat text-danger ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row ">
              <div class="col-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                  
                    
  
  
                     <div id="piechart" style="margin-left:50px;display: flex;justify-content: center;align-items: center;"></div>
                     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $ch; ?>
        ]);

        var options = {
          title: 'My Daily Activities',
          titleTextStyle: {
            color: 'white', // Couleur du titre en blanc
        },
          width: 700,
        height: 500,
          colors: ['#007BFF', '#28A745', '#FFC107', '#DC3545', '#17A2B8'],
        // Replace the colors above with your desired card colors
        backgroundColor: {
          fill: 'transparent', // Set the background color of the chart to transparent
        },
        legend: {
            textStyle: {
                color: 'white', // Couleur du texte de la légende en blanc
            },
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
                      
                   
                  </div>
                </div>
              </div>

              <div class="col-6 grid-margin">
                <div class="card" >
                  <div class="card-body" >
                    <h4 class="card-title">Order Status</h4>
                    <div class="table-responsive">
                    <div>
        
                          <canvas id="lineChart" style="height:500px;" ></canvas>


                          <script>
                              const ctx2 = document.getElementById('lineChart');

                              new Chart(ctx2, {
                                type: 'bar',

                                data: {
                                  labels:  <?php echo json_encode($months); ?>,
                                  datasets: [{
                                    label: 'Numbers of users by month',
                                    data:   <?php echo json_encode($monthcount); ?>,
                                    borderWidth: 1
                                  }]
                                },
                                options: {
                                  scales: {
                                    y: {
                                      beginAtZero: true
                                    }
                                  },
                                  maintainAspectRatio: false,
                                }
                              });
                            </script>





                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
             

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                    <div class="table-responsive">
                    
        
                          <canvas id="myChart"></canvas>


                          <script>
                              const ctx = document.getElementById('myChart');

                              new Chart(ctx, {
                                type: 'line',

                                data: {
                                  labels:  <?php echo json_encode($months); ?>,
                                  datasets: [{
                                    label: 'Numbers of users by month',
                                    data:   <?php echo json_encode($monthcount); ?>,
                                    borderWidth: 1
                                  }]
                                },
                                options: {
                                  scales: {
                                    y: {
                                      beginAtZero: true
                                    }
                                  }
                                }
                              });
                            </script>





                    </div>
                  </div>
                </div>
              </div>
            </div>
              
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>