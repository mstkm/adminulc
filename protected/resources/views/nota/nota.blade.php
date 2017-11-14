<!DOCTYPE html>
<html lang="en">
<head>
  <title>Receipt</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="../paper.css">
  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A5 potrait }</style>

  <!-- Custom styles for this document -->

  <style>
    body   
    {
     font-family: serif 
     margin-left:10px;
    }
    img
    {
      float: left;
      width: 150px;     
    }
    h1, p
    {
      font-size: 10pt;
      line-height: 0.5;
    }
    .kontak
    {
      font-size: 10pt;
      width: 100%;
      height: 100%;
      margin-left: 10px;
      text-align: left;
    }
    .logo
    {
      margin-top: 10px;
      height: 78px;
      float: left;
      background-color: white;
    }
    .nota
    {
      margin: 0px auto;
      font-size: 10pt;
      float: left;
    }
 
    .klir
    {
      clear: both;
    }
    .ttd
    {
      margin: 0px auto 10px 300px;
      text-align: center;
    }
    .attention
    {
      margin-left: 10px;
      font-size: 8pt;
      float: left;
    }
    table {
        border-collapse: separate;
        border-spacing: 30px 10px;
      }
    h1     {  font-size: 16pt;  margin-left: 10px;}

    article { padding: 5mm 10mm;  border-bottom: 2px dotted black  }

    .periode
    {
      text-align: center;
      background-color: grey;
      
      width: 70px;
    }
 
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body  onload="window.print()" class="A5 potrait">
<!-- <body> -->

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-20mm">
  <div class="logo">
  <img src="{{ URL::to('./images/logo.png')}}">    
  </div>
  <div class="kontak">
   <h1><i>UBAYA LANGUAGE CENTER</i></h1>    
      <p>PF Building 4th Floor</p>
      <p>Raya Kalirungkut, Surabaya 60293, Indonesia</p>
      <p>Phone (+6231) 298-1388, Fax (+6231) 298-1389  </p>
      <p>HP : +62857.3301.1417; Email : ulc@unit.ubaya.ac.id </p>
  </div>
  <div class="nota">
    <table>
      <tr>
        <td> 
        Recept No.        
        </td>

        <td>
        <?php echo 'N'.str_pad($customer->nonota, 4, '000', STR_PAD_LEFT); ?>
              
        </td>        
        <td></td>
        <td>
        <div class="periode">
  {{$periode->year}}          
  </div>
  </td>
        </tr>
      <tr>
         <td> 
         Received From 
        </td>

        <td><?php echo ucwords($customer->nama) ?>
        </td>
        </tr>
      <tr>
         <td> 
        For Payment of 
        </td>

        <td>
<?php echo strtoupper($customer->service.' - '.$customer->level);    ?>      
        </td>
        <td></td>
        <td> 
        @if($customer->test!=null)
          Date of Test : <?php echo date("D j M Y", strtotime($customer->tgltest)); ?>
          @endif
        </td>
        </tr>
      <tr>
         <td> 
Amount 
        </td>

        <td>
                    Rp. <?php echo number_format($customer->harga); ?>
        </td>
        <td></td>
        
        <td>
    @if($customer->bayar=='retur')
    RETUR
    @else
    TUNAI
    @endif
    </td>
      </tr>
    </table>
  </div>

  <div class=".klir"></div>
  <br/>
  
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br>
   <div class="ttd">
   <p>Surabaya, <?php echo date("d M Y"); ?>  </p>
   
   <br>
   <br>
   <br>
 <p>(....{{(Auth::user()->name)}}....)</p>

  </div>

  <div class="attention">
FM-ULC-1-SLIP BUKTI PEMBAYARAN <br/>   
      Khusus biaya pendaftaran Kursus (Rp. 25000,-) tidak dapat ditarik kembali
    

  </div>

   

    <article>
     
    </article>
   


  </section>
    <section class="sheet padding-20mm">
  <div class="logo">
  <img src="{{ URL::to('./images/logo.png')}}">    
  </div>
  <div class="kontak">
   <h1><i>UBAYA LANGUAGE CENTER</i></h1>    
      <p>PF Building 4th Floor</p>
      <p>Raya Kalirungkut, Surabaya 60293, Indonesia</p>
      <p>Phone (+6231) 298-1388, Fax (+6231) 298-1389  </p>
      <p>HP : +62857.3301.1417; Email : ulc@unit.ubaya.ac.id </p>
  </div>
  <div class="nota">
    <table>
      <tr>
        <td> 
        Recept No.        
        </td>

        <td>
         <?php echo 'N'.str_pad($customer->nonota, 4, '000', STR_PAD_LEFT); ?>          
        </td>
        <td></td>
        
        <td>  <div class="periode">
  {{$periode->year}}          
    
  </div></td>
        </tr>
      <tr>
         <td> 
         Received From 
        </td>

        <td><?php echo ucwords($customer->nama) ?>
        </td>
        </tr>
      <tr>
         <td> 
        For Payment of 
        </td>

        <td>
<?php echo strtoupper($customer->service.' - '.$customer->level);    ?>      
        </td>
        
        <td>          </td>
        <td>
        @if($customer->tgltest!=null)
          Date of Test : <?php echo date("D j M Y", strtotime($customer->tgltest)); ?>
          @endif
        </td>
        </tr>
      <tr>
         <td> 
Amount 
        </td>

        <td>
       Rp. <?php echo number_format($customer->harga); ?>
        </td>
        <td></td>
        <td>
       @if($customer->bayar=='retur')
        RETUR
        @else
        TUNAI
        @endif
        </td>
      </tr>
    </table>
  </div>

  <script type="text/javascript">
    
    setTimeout(function () {
   window.location.href= '{!!url('/admin')!!}'; // the redirect goes here
  },200);

  </script>

  <div class=".klir"></div>
  <br/>
  
  <br/>
  <br>
  <br/>
  <br/>
  <br/>
  <br>
   <div class="ttd">
   <p>Surabaya, <?php echo date("d M Y"); ?>  </p>
   
   <br>
   <br>
   <br>
   <p>(....{{(Auth::user()->name)}}....)</p>

  </div>

  <div class="attention">
FM-ULC-1-SLIP BUKTI PEMBAYARAN <br/>   
      Khusus biaya pendaftaran Kursus (Rp. 25000,-) tidak dapat ditarik kembali
    

  </div>

   

    <article>
     
    </article>
   


  </section>
</body>

</html>
