<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<div class="container" style="font-size:15;">
   <div class="row">

        <div class="text-left" style="float: left;display: inline-block;"> 

          <img src="{{asset('images/logo_vertical.jpg')}}" width="124" height="124">

      </div>
      <style type="text/css">
         
          th,tr,td{
            line-height: 40px;
          }
      </style>
      <div style=" margin-left: 30%;" > <h3>BERITA ACARA KURSUS</h3></div>

      <div class="text-left"> 
        <table class="table table-bordered " style="  width: 300px; margin-left: 65% ;margin-top: -30; height: 3px;  ">
            <thead>
                <tr style="line-height: 10px;">
                    <td >No. Dokumen</td>
                    <td >FM-ULC-03/-/04</td>
                   


                </tr>
                 <tr>
                    <td >No. Revisi</td>
                    <td >-</td>                  


                </tr>
                 <tr>
                    <td >Tanggal Berlaku</td>
                    <td >09 Nopember 2010</td>              


                </tr>

            </thead>

        </tbody>
    </table>
</div>
<div style="border: 2px solid; margin-top: 2%;" class="col-md-8"></div>
      
<br><br><br>
<div class="col-md-10">
    <table style=" margin-left: 6%"> 
   <?php 

   $day = date('D', strtotime($schedule->start));
$dayList = array(
  'Sun' => 'Minggu',
  'Mon' => 'Senin',
  'Tue' => 'Selasa',
  'Wed' => 'Rabu',
  'Thu' => 'Kamis',
  'Fri' => 'Jumat',
  'Sat' => 'Sabtu'
);

 ?>
            
          
            <tr><td style="width: 30px;">1.</td><td>Hari, Tanggal</td><td>:  <?php echo $dayList[$day].', '.date("j M Y", strtotime($schedule->start)); ?></td>
            <tr><td>2.</td><td>Pelaksanaan Test</td>
            <td>
              <tr class="text-left" >
            <td></td><td>Mulai </td><td>:<?php echo ' '.date('H : i',strtotime($schedule->start)); ?></td>
          <tr>
            <td></td><td>Selesai </td><td>:<?php echo ' '.date('H : i',strtotime($schedule->end)); ?></td>
            <tr>
            <td></td><td>Lamanya </td><td>: <?php echo ' '.$schedule->durasi.' Menit'; ?></td>
            </tr>
            </td>
            </tr>
            <tr><td>3.</td><td>Jumlah peserta sesuai daftar</td> <td>:  <?php    echo $jumlah.' Orang';?></td></tr>
             <tr><td>4.</td><td>Jumlah peserta tidak hadir</td> <td>: __ Orang</td></tr>

             <tr><td>5.</td><td>Kejadian selama tes berlangsung </td> <td>:</td></tr>
             
             </tr>

              
             
     
    </table>
    <br>

<div style="width: 85%;margin-left: 80px;">
    <div style="border: 1px dotted; margin-top: 20px;"></div>
    <br><br>
             <div style="border: 1px dotted; margin-top: 20px;" "></div><br>
             <br>
             <div style="border: 1px dotted; margin-top: 20px;" ></div>



             <br>
             <br>
             <br> <br>
             <br>
             
             <div class="text-right" >Surabaya, <?php echo date("j M Y", strtotime($schedule->start)); ?></div>

<br><br>
<br><br>
<div class="text-left" style="float: left;" >
             <div style="margin-left: 100px;" >Menyetujui</div>
             <br>
             <div style="margin-left: 80px;">Wakil Peserta Tes</div>

               <br>
             <br>
             <br>
             <br>
             <br><br>
             <br>
             <div style="border: 1px dotted; width: 280px;" ></div>
             </div>

             <div class="text-right" style="float: right;">
          <br><br>
             <div  style="margin-right: 40%;" ></div>
             <div  style="margin-right: 40%;" >Pengawas</div>

               <br>
             <br>
             <br><br>
             <br>
             <br>
             <br>
             <div style="border: 1px dotted; width: 280px;" ></div>
             </div>





</div>

</div>