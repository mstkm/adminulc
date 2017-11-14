<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<?php

$po=0;


 while ($jumweek > 0) {
  ?>
  <div class="container">
   

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
                    <td >FM-ULC-01/01/03</td>
                   


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
<div style="border: 2px solid; margin-top: 2%;"></div>

<?php if ($po==0) {
  # code...
 ?>
      
       <h2>Kursus : <?php echo ucwords($level->sname) .' '.ucwords($level->lname);?></h2>
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Pengajar</th>
                    <th>Jadwal</th>                           
                    <th>Ruang</th>
                    <th class="text-center">Periode</th>

                </tr>

            </thead>
            <tbody>
                {{-- */$x=0;/* --}}
                @for($i=0;$i<sizeOf($pengajar);$i++)
                {{-- */$x++;/* --}}
                <tr>                
                    <td><?php echo ucwords($pengajar[$i]->cname); ?></td>
                   <td><?php echo date('D, H:i',strtotime($pengajar[$i]->start)).' s/d '.date('H:i',strtotime($pengajar[$i]->end)); ?></td>
                    <td><?php echo ucwords($pengajar[$i]->rname); ?></td>
                    @if($x==1)
                    <td rowspan="<?php echo sizeof($pengajar); ?>" class="text-center" > {{$periode->year}} Q{{$periode->quarter}} </td>      @endif             
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <?php }

    else{

      echo "<br><br>";
      } ?>


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center" style="width: 15px;">No</th>
                <th class="text-center" style="width: 50%;">Topik </th>
                <th class="text-center" >Pengajar</th>
                <th class="text-center">TTD </th>


            </tr>
            
          
        </thead>
        <tbody>
            
            <?php 
             for ($k=0; $k < 19 /*$jumrow*/; $k++) 
             {
           
            $po++;
            echo '<tr ><td class="text-center" style="line-height: 30px;">'.$po.'</td><td></td><td></td><td></td></tr>';
              
                }
      

           ?>
        </tbody>
    </table>
</div>
<?php 
   $jumweek=$jumweek-19;
   //$temp++;
} ?>

