<!-- ChartJS -->
<script src="<?= base_url('')?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- page script -->
<script type="text/javascript">

    /*
      Chart Pelatihan Koperasi
    */
    var ctx = document.getElementById('pelatihanKoperasiChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Berpengalaman',
          'Tidak Berpengalaman',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              'green',
              'red',
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_lahan","pelatihan_koperasi","1")?>,
              <?= $this->fungsi->hitung_rows("tb_lahan","pelatihan_koperasi","2")?>,

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
      Chart Sertifikasi Petani
    */
    var ctx = document.getElementById('pelatihanSertifikasiChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Berpengalaman',
          'Tidak Berpengalaman',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              'green',
              'red',
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_lahan","pelatihan_sertifikasi","1")?>,
              <?= $this->fungsi->hitung_rows("tb_lahan","pelatihan_sertifikasi","2")?>,

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
      Chart Sertifikasi Petani
    */
    var ctx = document.getElementById('petaniIcsChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Tersertifikasi',
          'Tidak Tersertifikasi',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              'green',
              'red',
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_lahan","petani_ics","1")?>,
              <?= $this->fungsi->hitung_rows("tb_lahan","petani_ics","2")?>,

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
      Chart Sertifikasi Petani SNI
    */
    var ctx = document.getElementById('petaniSniChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Tersertifikasi',
          'Tidak Tersertifikasi',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              'green',
              'red',
            ],
            data: [
              <?= $this->fungsi->hitung_rows("tb_lahan","petani_sni","1")?>,
              <?= $this->fungsi->hitung_rows("tb_lahan","petani_sni","2")?>,

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
        Berdasarkan sebaran Komoditas ITEM
    */

    var ctx = document.getElementById('komoditasItemChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            $x = $this->fungsi->pilihan("tb_komoditas_item");
            foreach ($x->result() as $key => $data) {
              echo "'" . $data->deskripsi ."',";
            }
          ?>          
        ],

        datasets: [{
            label: 'Persebaran Berdasarkan Komoditas :',
            backgroundColor: '#ADD8E6',
            backgroundColor : [
              <?php
                $maksimal_warna = $this->fungsi->pilihan("tb_komoditas_item")->num_rows(); 
                for ($x = 0; $x <= $maksimal_warna; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            colorPool:['red','green','orange'],
            useRandomColors: true,
            data: [
              <?php
                  $x = $this->fungsi->pilihan("tb_komoditas_item");
                  foreach ($x->result() as $key => $data) {
                    echo "'" . $this->fungsi->countLike1("tb_lahan","komoditas",$data->deskripsi) ."',";
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