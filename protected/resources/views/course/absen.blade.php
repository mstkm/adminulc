<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


<?php
$temp=1;
$week=$jumweek;
$i=0;
$pertemuan=1;

 while ($week > 0) {


    ?>
<div class="container">
   

        <div class="text-left" style="float: left;display: inline-block;"> 

          <img src="{{asset('images/logo_vertical.jpg')}}" width="124" height="124">

      </div>
      <div class="text-center"> <h1>DAFTAR HADIR KURSUS</h1></div>

      <div class="text-left"> 
        <table class="table table-bordered " style="  width: 300px; margin-left: 76%;margin-top: -50; height: 10px;  ">
            <thead>
                <tr>
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

      <?php if ($i==0) {
          # code...
      ?>
       <h2>Kursus : <?php echo ucwords($level->sname) .' '.ucwords($level->lname);?></h2>
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Pengajar</th>
                    <th>Jam</th>                           
                    <th>Ruang</th>
                    <th class="text-center">Periode</th>

                </tr>

            </thead>
            <tbody>
                {{-- */$x=0;/* --}}
                @for($i;$i<sizeOf($pengajar);$i++)
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
else {
    echo "<br><br>";
}?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center" rowspan="3">No</th>
                <th rowspan="2">Nama </th>
                <th class="text-center" colspan="14"> Tanggal</th>                           

            </tr>
            <tr>
                <?php for ($i=1; $i <14+1 ; $i++) { 
                    echo '<th style="height:40px;"></th>';
                } ?>



            </tr>
            <tr>
                <th class="text-right">Pertemuan</th>
                <?php for ($i=1; $i <14+1 ; $i++) { 
                    echo '<th style="width:60px; text-align:center;">'.$pertemuan.'</th>';
                    $pertemuan++;
                } ?>





            </tr>
        </thead>
        <tbody>
            
            <?php  $x=0;
             for ($k=0; $k < sizeof($customer) ; $k++) 
             {
           
            $x++;
            echo '<tr><td class="text-center">',$x,'</td><td>'.ucwords($customer[$k]->name).'</td>';
               for ($i=1; $i <14+1 ; $i++) 
                    { 
                        echo '<td></td>';
                    } 
                }
            
            echo "</tr>";

            if($x!=10)
            {
            for ($j=0; $j < (10- sizeof($customer)) ; $j++) 
                { $x++;
                   echo '<tr><td class="text-center">'.$x.'</td><td></td>';
                
                for ($i=1; $i <14+1 ; $i++) { 
                        echo '<td></td>';
                    }
                }
                echo "</tr>";
                }  ?>
        </tbody>
    </table>
</div>

<?php 
   $week=$week-14;
   $temp++;
} ?>