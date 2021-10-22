<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>
<div class="main_contant">
    <div class="bread-crumbs">
    <ul>
        <li>
            <span><i class="fas fa-home"></i></span>
            <h3>Dashboard</h3>
        </li>
    </ul>
    </div>

    <div class="info_card">
    <div class="card">
        <span><i class="fas fa-hourglass-half"></i></span>
        <div class="number_detail">
            <p>Total Order Not Complete</p>
            <h2><?php echo count($pmsn)?></h2>
        </div>
        
    </div>
    <div class="card">
        <span><i class="fas fa-file-invoice-dollar"></i></span>
        <div class="number_detail">
            <p>Total Completed Order</p>
            <h2><?php echo count($pemesanan);?></h2>
        </div>
    </div>
    <div class="card">
        <span><i class="fas fa-hand-holding-usd"></i></span>
        <div class="number_detail">
            <p>Total Income</p>
            <?php $abc =0; foreach($pemesanan  as $pemesanan){
                $abc = $abc+$pemesanan->total_gross;
            }?>
            <h2><?php echo rupiah($abc)?></h2>
        </div>
    </div>
    </div>

    <!-- <div class="content_table">
        <div class="title">
            <h2>Role in Comapny</h2>
        </div>
        <div class="main">
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>User Type</td>
                        <td>Joined</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Adil Hardin</td>
                        <td>adilhardin@email.com</td>
                        <td>Admin</td>
                        <td>25 Apr, 2020</td>
                        <td><a href="#" class="btn">Pending</a></td>
                    </tr>
                        <tr>
                            <td>Volkan Cekerek</td>
                            <td>volkancekerek@email.com</td>
                            <td>Admin</td>
                            <td>1 jun, 2019</td>
                            <td><a href="#" class="btn">Pending</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    
    </div> -->
</div>
<!-- End Main content -->
<div class="horizontal-dashboard">

<div class="main_contant" style="width: 100%;">
    <div class="bread-crumbs">
        <ul>
            <li>
                <!-- Foreach sampe desember -->
                <?php $totalJanuari = 0; foreach($gross_januari as $row){
                    $totalJanuari = $totalJanuari + $row->jumlah;}?>
                <?php $totalFebruari = 0; foreach($gross_februari as $row){
                    $totalFebruari = $totalFebruari + $row->jumlah;}?>
                <?php $totalMaret = 0; foreach($gross_maret as $row){
                    $totalMaret = $totalMaret + $row->jumlah;}?>
                <?php $totalApril = 0; foreach($gross_april as $row){
                    $totalApril = $totalApril + $row->jumlah;}?>
                <?php $totalMei = 0; foreach($gross_mei as $row){
                    $totalMei = $totalMei + $row->jumlah;}?>
                <?php $totalJuni=0; foreach($gross_juni as $row){
                    $totalJuni = $totalJuni +$row->jumlah;}?>
                <?php $totalJuli = 0; foreach($gross_juli as $row){
                    $totalJuli = $totalJuli + $row->jumlah;}?>
                <?php $totalAgustus = 0; foreach($gross_agustus as $row){
                    $totalAgustus = $totalAgustus + $row->jumlah;}?>
                <?php $totalSeptember = 0; foreach($gross_september as $rows){
                    $totalSeptember = $totalSeptember + $row->jumlah;}?>
                <?php $totalOktober = 0; foreach($gross_oktober as $row){
                    $totalOktober = $totalOktober + $row->jumlah;}?>
                <?php $totalNovember = 0; foreach($gross_november as $row){
                    $totalNovember = $totalNovember + $row->jumlah;}?>
                <?php $totalDesember = 0; foreach($gross_desember as $row){
                    $totalDesember = $totalDesember + $row->jumlah;}?>
            </li>
        </ul>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="chart" width="400" height="100"></canvas>
    <script>
    new Chart(document.getElementById("chart"), {
    type: 'bar',
    data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
      "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [
        {
          label: "Income(IDR)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#e5d549"],
          data: [<?php echo $totalJanuari?>,<?php echo $totalFebruari?>,<?php echo $totalMaret?>,<?php echo $totalApril?>,<?php echo $totalMei?>,<?php echo $totalJuni?>,
          <?php echo $totalJuli?>,<?php echo $totalAgustus?>,<?php echo $totalSeptember?>,<?php echo $totalOktober?>,<?php echo $totalNovember?>,<?php echo $totalDesember?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Total Income in A Month'
      }
    }
});
    </script>
    
</div>

</div>

</div>
<!-- End Vertical -->