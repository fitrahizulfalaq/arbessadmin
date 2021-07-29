<!-- ChartJS -->
<script src="<?= base_url('')?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- page script -->
<script type="text/javascript">


    var ctx = document.getElementById('kelaminChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Laki - Laki',
          'Perempuan',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                for ($x = 0; $x <= 10; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_user","kelamin","Laki-Laki")?>,
              <?= $this->fungsi->hitung_rows("tb_user","kelamin","Perempuan")?>,

            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });

    var ctx = document.getElementById('pekerjaanChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php
            $x = $this->fungsi->pilihan("tb_pekerjaan");
            foreach ($x->result() as $key => $data) {
              echo "'" . $data->deskripsi ."',";
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                $maksimal_warna = $this->fungsi->pilihan("tb_pekerjaan")->num_rows(); 
                for ($x = 0; $x <= $maksimal_warna; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?php
                $x = $this->fungsi->pilihan("tb_pekerjaan");
                  foreach ($x->result() as $key => $data) {
                    echo "'" . $this->fungsi->pilihan_advanced("tb_user","pekerjaan_utama",$data->id)->num_rows() ."',";
                  }
              ?>
            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });


    /*
      Berdasarkan Pendidikan
    */

    var ctx = document.getElementById('pendidikanChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'SD sederajat',
          'SMP sederajat',
          'SMA sederajatt',
          'Diploma 3',
          'S1',
          'S2',
          'S3',
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                for ($x = 0; $x <= 10; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","SD sederajat")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","SMP sederajat")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","SMA sederajat")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","Diploma 3")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","S1")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","S2")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pendidikan_terakhir","S3")?>,

            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });

    /*
      Berdasarkan Pernikahan
    */

    var ctx = document.getElementById('pernikahanChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Belum Menikah',
          'Menikah',
          'Cerai Hidup',
          'Cerai Mati',
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                for ($x = 0; $x <= 10; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_user","pernikahan","Belum Menikah")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pernikahan","Menikah")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pernikahan","Cerai Hidup")?>,
              <?= $this->fungsi->hitung_rows("tb_user","pernikahan","Cerai Mati")?>,

            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });


    /*
        Berdasarkan sebaran Provinsi
    */

    var ctx = document.getElementById('provinsiChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            $x = $this->fungsi->pilihan("provinces");
            foreach ($x->result() as $key => $data) {
              echo "'" . $data->name ."',";
            }
          ?>          
        ],

        datasets: [{
            label: 'Persebaran Petani Berdasarkan Provinsi :',
            backgroundColor: '#ADD8E6',
            backgroundColor : [
              <?php
                $maksimal_warna = $this->fungsi->pilihan("provinces")->num_rows(); 
                for ($x = 0; $x <= $maksimal_warna; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            colorPool:['red','green','orange'],
            useRandomColors: true,
            data: [
              <?php
                  $x = $this->fungsi->pilihan("provinces");
                  foreach ($x->result() as $key => $data) {
                    echo "'" . $this->fungsi->pilihan_advanced("tb_user","provinsi",$data->id)->num_rows() ."',";
                  }
              ?>
            ]
        }]
    },
    options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        },
    options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });
    

    function dynamicColors() {
        var hex = "0123456789ABCDEF",
            color = "#";
        for (var i = 1; i <= 6; i++) {
          color += hex[Math.floor(Math.random() * 16)];
        }
        return color;
    }

</script>