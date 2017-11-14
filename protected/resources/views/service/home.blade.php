@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> DAFTAR PENDAFTAR KURSUS </h4><hr>
                                             <div class="form-group">                            
                            <div class="col-md-3">
                                <select id="admin" name="type" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);""> 
                                <option value="-"><i class="fa fa-btn "></i>Pilih Level</option>
                                    @foreach($level as $item)
                                    <option value="{!!$item->id!!}"><i class="fa fa-btn "></i>{!!$item->nama!!}</option>
                                    @endforeach 
                                    </select>
                            </div>
                        </div>
                              <div class="col-md-4">
                <a href="{!!url('/admin/service/level/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Level</a>

            </div>
                  



            <div class="col-md-5 ">
                {!! Form::open(['method'=>'GET','url'=>'caribuku','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                         </span>
                     </span>
                 </div>
                 {!! Form::close() !!}
            </div>
        </div><br>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Kursus</th>                          
                        <th>Level</th>
                        
                        <th>Pembayaran</th>
                                                <th>Biaya</th>
                        
                        <th>Action</th>
                    </tr>
            </thead>
             <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{ $item->tanggal }}</td><td>{{ $item->nama }}</td><td>{{ $item->kursus }}</td><td>

                    @if($item->kursus==3)
                    $item->date
                    @else 
                    {{ $item->level }}                  

                  @endif

                  </td><td><?php echo  strtoupper(" $item->bayar "); ?></td><td>Rp. {{ $item->harga }}</td>
                    <td>
                        
                            <a href="{{ url('/admin/edit/' . $item->idu) }}" class="btn btn-primary btn-xs" title="Tambah Jadwal"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>                                               
                           
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        
    </div>
   
        </div>
      

@endsection