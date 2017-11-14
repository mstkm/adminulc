@extends('layouts.app')
@section('content')

<div class="section">
       

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Kursus </h4><hr>
            <div class="col-md-6">
            
                <a href="{!!url('admin/service/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Layanan</a>
                <a href="{!!url('admin/test/schedule/add')!!}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Jadwal Test</a>
                <a href="{!!url('admin/customer/test/add')!!}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Peserta</a>
            
            </div>
            <div class="col-md-2">
            </div>
          <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'admin/customer/search','role'=>'search'])  !!}
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
        </div>
        <br>
        
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        
                        <th>Nama</th>
                        <th>Status Bayar</th>
                        <th>Level </th>                          
                        
                        
                        <th class="text-center">Action</th>
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name) ?></td><td>{{ $item->bayar }}</td><td>{{ $item->level }}</td>
                  
                    
                    <td class="text-center"> 
                    
                            <a href="{{ url('/admin/customer/' . $item->username') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>                            
                            <a href="{{ url('/admin/customer/nota/' . $item->idn) }}" class="btn btn-warning btn-xs" title="Print Nota Customer"><span class="glyphicon glyphicon-print" aria-hidden="true"/></a>  
                    
                        @if($item->test==null)
                            
                        @if($item->bayar=='kursus'||$item->bayar=='lunas')

                            @if($item->reference!=NULL)
                            <a href="" class="disabled btn btn-primary btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-repeat" aria-hidden="true" title="Delete Post" /></a>
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
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'kursus',
                                    'onclick'=>'return confirm("Confirm Kursus?")'
                            ));!!}
                        {!! Form::close() !!} 
                        @else
                        <a href="" class="disabled btn btn-primary btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-check" aria-hidden="true" title="Delete Post" /></a>
                        @endif
                        @elseif($item->bayar=='retur')  
                        <a href="" class="disabled btn btn-primary btn-xs" title="Lihat Data Customer "><span class="glyphicon glyphicon-repeat" aria-hidden="true" title="Delete Post" /></a>                                                              
                        @endif

                        @else
                        
                        <a href="{{ url('/admin/customer/nota/schedule/edit/' . $item->idn) }}" class="btn btn-danger btn-xs" title="Pindah Tanggal Test"><span class="glyphicon glyphicon-retweet" aria-hidden="true"/></a>  
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
        <!-- <div class="pagination-wrapper"> {!! $customer->render() !!} </div> -->
    </div>
  </div>

</div>






@endsection