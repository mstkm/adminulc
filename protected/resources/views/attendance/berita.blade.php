<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<div class="container">


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">Pengajar</th>
                <th>Jadwal </th>
                <th>Ruang</th>                           
                <th>Periode</th>                           


            </tr>
        </thead>
        <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pengajar as $item)
            {{-- */$x++;/* --}}
            <tr>
                <td class="text-center">{{ $x }}</td>
                <td><?php echo ucwords($item->name); ?></td>
                <td><?php echo ucwords($item->day); ?> , <?php echo ucwords($item->day); ?></td>                    
            </tr>
            @endforeach
        </tbody>
    </table>


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Tanggal </th>
                <th>Topik</th>  
                <th>Pengajar</th>  
                <th>Ttd</th>                          

            </tr>
        </thead>
        <tbody>
            {{-- */$x=0;/* --}}
            @for($i=0;$i<$pertemuan;$i++)
            {{-- */$x++;/* --}}
            <tr>
                <td class="text-center">{{$x}}</td><td></td><td></td><td></td><td></td>


            </tr>
            @endfor
        </tbody>
    </table>

</div>

