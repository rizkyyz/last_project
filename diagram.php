<?php

$koneksi = mysqli_connect("localhost", "root", "", "db");

$id = "";
$ip= "";
$date= "";  
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

<div class="row">

           
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

<?php 

$labels = array();
$values = array();
$sql = "SELECT date,COUNT(*) AS jumlah_harian FROM pengunjung GROUP BY date";
$query = mysqli_query($db, $sql);
$jumlah = 'jumlah_harian';
$colum = 'date';
while ($datas = mysqli_fetch_assoc($query)) {
  $labels[] = $datas[$colum];
  $values[] = $datas[$jumlah];
}


?>
const ctx1 = document.getElementById('myChart1');

var labels = <?php echo json_encode($labels); ?>;
var values = <?php echo json_encode($values); ?>;

new Chart(ctx1, {
type: 'bar',
data: {
labels: labels,
datasets: [{
label: 'data count',
data: values,
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



</body>
</html>
