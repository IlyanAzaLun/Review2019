<?php
include "./models/m_barang.php";
$brg = new Barang($connection);
$tampil = $brg->tampil();
while($data = $tampil->fetch_object()){
	$nama_brg[] = $data->nama_brg;
	$stok_brg[] = intval($data->stok_brg);
}
?>
<div class="row">
  <div class="col-lg-12">
    <h1>Barang <small>Grafik Data barang</small></h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
      <li><a href="">Barang</a></li>
      <li class="active">Grafik Data barang</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row col-lg-12">
	<div class="table-responsive">
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</div>
<script src="./assets/js/highcharts/highcharts.js"></script>
<script src="./assets/js/highcharts/exporting.js"></script>
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Data Nama dan Jumlah Stok Barang'
    },
    subtitle: {
        text: 'Source: Wikipedia.org'
    },
    xAxis: {
        categories: <?=json_encode($nama_brg);?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: false,
        valueSuffix: ' Piece'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Jumlah Stok',
        data: <?=json_encode($stok_brg);?>
    }]
});
</script>
</div>