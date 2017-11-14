<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


<?php
$p=0;
$j=0;
//$jumlah=30;
$y=0;
$x=0;
 while ( $jumlah>0) {
    
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
      <div style=" margin-left: 30%;" > <h3>DAFTAR HADIR</h3></div>

      <div class="text-left"> 
        <table class="table table-bordered " style="  width: 300px; margin-left: 65% ;margin-top: -30; height: 3px;  ">
            <thead>
                <tr style="line-height: 10px;">
                    <td >No. Dokumen</td>
                    <td >FM-ULC-03/-/02</td>
                   


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
<br>
      
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Nama </th>
                    <th>Fakultas / Intansi</th>                           
                    <th colspan="2">Tanda Tangan</th>
                    

                </tr>

            </thead>
            <tbody>
<?php if($p>0)
     {
        if (sizeof($customer)>25) {
            # code...
        ?>
                
                @for($i=0;$i<sizeOf($customer);$i++)
                {{-- */$x++;/* --}}
                <tr>                
                    <td class="text-center"> {{$x}}</td>
                    <td><?php echo ucwords($customer[$i]->name); ?> </td>
                    <td></td>
                   <?php if ($x%2!=0) {
                        echo "<td rowspan=2>$x</td>";
                        if(($x-1)%25==0)
                            echo "<td bgcolor=grey></td>";
                    }
                        else{
                            echo "<td rowspan=2>$x</td>";
                        }
                     ?> 
                    
                               
                </tr>
                @endfor

                <?php 
            }
}
else
{?>
@for($i=0;$i<sizeOf($customer);$i++)
                {{-- */$x++;/* --}}
 <tr>                
                    <td class="text-center"> {{$x}}</td>
                    <td><?php echo ucwords($customer[$i]->name); ?> </td>
                    <td></td>
                   <?php if ($x%2!=0) {
                        echo "<td rowspan=2>$x</td>";
                        if(($x-1)%25==0)
                            echo "<td bgcolor=grey></td>";
                    }
                        else{
                            echo "<td rowspan=2>$x</td>";
                        }

                     ?> 
                    
                               
                </tr>
                 @endfor

<?php }
                if($x!=25)
                {
                    $x;
            for ($j; $j < (25- sizeof($customer)) ; $j++) 
                { 
                    $x++;

                  
                   echo '<tr><td class="text-center">'.$x.'</td><td></td><td></td>';                
                   if ($y%2!=0) {
                        echo "<td rowspan=2>$x</td>";}
                        else{
                            echo "<td rowspan=2>$x</td>";
                        }

            
                echo "</tr>";
                }}   ?>
            </tbody>
        </table>
    </div>
</div>

<?php 


$jumlah=$jumlah-25;
$p++;
$j=$j-1;

echo "<br><br><br><br>";
} ?>


