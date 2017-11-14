@extends('layouts.app')
@section('content')
 
<div class="container">
       <div class=row>
        
     

 <div class="col-md-4 btn-group" role="group" aria-label="...">
    

  <!-- <div class="btn-group" role="group">

    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tambah Customer
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/customer/course/add')!!}" > Kursus</a></li>
         <li><a href="{!!url('admin/customer/test/add')!!}" >Test</a></li>
    </ul>
  </div>    -->          
    <a class="btn btn-info" href="{!!url('admin/customer/course/add')!!}" ><i class="glyphicon glyphicon-plus"></i> Kursus</a>
    <a class="btn btn-success" href="{!!url('admin/customer/test/add')!!}" ><i class="glyphicon glyphicon-plus"></i> Test</a>
</div></div>
          
  
<br>
        <table id="example1"  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th class="num">No. Nota</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Kursus / Test</th>                          
                        <th>Keterangan</th>
                        <th>Jenis Bayar</th>
                        <th>Harga</th>
                        <th>Staff</th>
                        <th class="action">Action</th>
                </tr>
            </thead>

            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($nota as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo 'N'.str_pad($item->idn, 4, '000', STR_PAD_LEFT); ?></td><td><?php echo date('j-m-Y, H : i  ',strtotime($item->tanggal)); ?>
                        
                    </td><td><?php echo ucwords($item->cname ) ?></td><td><?php echo ucwords($item->sname );?></td><td>
                    @if($item->test==NULL)
                    <?php echo ucwords($item->lname );?>
                    @else
                    <?php echo date("j-m-Y", strtotime($item->tgltest)); ?>

                    @endif
                    </td><td><?php echo  strtoupper($item->bayar ); ?></td><td>
                    Rp. <?php 
                    if($item->harga<0)
                    {
                        echo  number_format(-1*$item->harga);
                    }
                    else
                    {
                         echo  number_format($item->harga); 
                    }
                   ?>
                    </td>
                    <td><?php echo ucwords( $item->staff );?>

                    
                    </td>
                    
                    
                    <td class="text-center"> 
                    
                            <a href="{{ url('/admin/customer/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="right" title="Lihat Data Customer" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/admin/nota/' . $item->idn.'/print') }}" target="_blank" class="btn btn-info btn-xs" title="Print Nota Customer"><span class="glyphicon glyphicon-print" aria-hidden="true"/></a>  
                    
                        @if($item->test==null)
                            
                        @if($item->bayar=='kursus'||$item->bayar=='lunas')

                            @if($item->reference!=NULL)
                            <a href="" class="disabled btn btn-default btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-repeat" aria-hidden="true" title="Delete Post" /></a>
                            @else
                            {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/nota/update', $item->idn],
                            'style' => 'display:inline'
                            ]) !!}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="bayar" value="retur">
                                {!! Form::button('<span class="glyphicon glyphicon-repeat" aria-hidden="true" title="Retur" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-warning btn-xs',
                                        'title' => 'retur',
                                        'onclick'=>'return confirm("Confirm Retur?")'
                                ));!!}
                            {!! Form::close() !!}
                            @endif                     

                        @elseif($item->bayar=='daftar')
                        @if($item->reference==null)
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/nota/update', $item->idn],
                            'style' => 'display:inline'
                        ]) !!}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="bayar" value="kursus">
                            {!! Form::button('<span class="glyphicon glyphicon-check" aria-hidden="true" title="Kursus" />', array(
                                    'type' => 'hidden',
                                    'class' => 'btn btn-warning btn-xs',
                                    'title' => 'kursus',
                                    'onclick'=>'return confirm("Confirm Kursus?")'
                            ));!!}
                        {!! Form::close() !!} 
                        @else
                        <a href="" class="disabled btn btn-primary btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-check" aria-hidden="true" title="Delete Post" /></a>
                        @endif
                        @elseif($item->bayar=='retur')  
                        <a href="" class="disabled btn btn-default btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-repeat" aria-hidden="true" title="Delete Post" /></a>                                                              
                        @endif

                        @else
                        
                        <a href="{{ url('/admin/customer/nota/schedule/edit/' . $item->idn) }}" class="btn btn-warning btn-xs" title="Pindah Tanggal Test"><span class="glyphicon glyphicon-retweet" aria-hidden="true"/></a>  
                        @endif 

                     
                        @if(Auth::user()->admin=='admin'||Auth::user()->admin=='direktur'||Auth::user()->admin=='kepala')
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/nota/delete', $item->idn],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}   
                        @endif 
                        

                                                    
                            
                           
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection