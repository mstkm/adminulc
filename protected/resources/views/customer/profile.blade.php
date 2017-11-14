@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
                <div class="panel-heading">Profil Customer
                @if(Auth::user()->admin!='dosen') 
                <a href="{{ url('/admin/customer/edit/'.$customer->id) }}" class="fa-btn navbar-right">Edit Data Customer</a>
                @endif          
                    <div class="panel-body ">

          
                     
                    <div class="panel-body ">
                        <strong>
                            @if($customer->photo==null)
                            <img src="{{ asset('images/user.png') }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @else
                            <img src="{{ asset('images/customer/'.$customer->photo) }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @endif

                            <p style="text-align:center;"><?php echo ucwords($customer->name);?> 
                            <p style="text-align:center;"><?php echo ucwords($customer->username);?> 
                            <p style="text-align:center;">{{ $customer->phone }} 
                            <p style="text-align:center;">{{ $customer->email }}                           
                    </div> 
                </div>
            </div>                 
        </div>

        <h4><i class="fa fa-book"></i> Riwayat  

  <!-- <div class="btn-group" role="group">

    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tambah Customer
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/customer/course/add')!!}" > Kursus</a></li>
         <li><a href="{!!url('admin/customer/test/add')!!}" >Test</a></li>
    </ul>
  </div> -->  </h4>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>                        
                        <th>Kursus / Test</th>                          
                        <th>Level / TGL Test</th>
                        <th>Jenis Bayar</th>
                        <th>Harga</th>
                        <th>Status Buku</th>
                        <th>Score</th>
                        
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($history as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->service) ?></td><td>
                    @if($item->test==NULL)
                    {{ $item->level }}
                    @else
                    <?php echo date("D j M Y", strtotime($item->tgltest)); ?>

                    @endif
                    </td><td><?php echo  strtoupper(" $item->bayar "); ?></td><td>
                    Rp. {{$item->harga}}
                    </td>\
                    <td>@if($item->book_status===0)
                    <a href="{{url('admin/nota/setbook/'.$item->id)}}" class="btn btn-danger btn-xs" @if(Auth::user()->admin=='dosen') disabled @endif>Belum diambil</a> 
                    @else
                    
                    <a href="{{url('admin/nota/setbook/'.$item->id)}}"  class="btn btn-primary btn-xs" @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')
                    disabled 
                    @endif >Sudah diambil</a>
                    @endif</td>
                    <td>{{$item->grade}}</td>
                    
                  
                </tr>
            @endforeach
            
            </tbody>
        </table>   
@if(Auth::user()->admin!='dosen')  
        <h4><i class="glyphicon glyphicon-time"></i> Jadwal Pilihan  
   
              <a href="{!!url('admin/customer/'.$customer->username.'/schedule/pick')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>

         </h4>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Hari</th>                        
                        <th>Jam Mulai</th>                          
                        <th>Selesai</th> 
                        <th class="text-center">Action</th>                        
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($schedule as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td>{{ $item->day }}</td><td><?php echo date('H:i',strtotime($item->start));?></td><td>
                   <?php echo date('H:i',strtotime($item->end));?>
                    <td class="text-center"> {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/'.$customer->username.'/pick/delete/'.$item->id],
                            'style' => 'display:inline'
                        ]) !!}
                     
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Kursus" />', array(
                                    'type' =>  'hidden',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'kursus',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!} </td>
                  
                    
                  
                </tr>
            @endforeach
            
            </tbody>
        </table>     @endif
    </div>
        </div>
      
@endsection