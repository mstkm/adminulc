

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Form Evaluasi Kelas {{$customer->level}} Tahun Ajaran {{$customer->tahun }} Periode {{$customer->triwulan}} <p class="fa-btn navbar-right"><?php echo ucwords($customer->nama); ?></p> </div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/report/store') }}">                    
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif    


                                            
                    <input type="hidden" name="notaid" value="{{$customer->notaid}}">
                    <input type="hidden" name="kp" value="{{$customer->kelas}}">
                    <input type="hidden" name="id" value="{{$customer->lid}}">

            <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">A</th>
                        <th>Materi</th>
                        <th class="text-center num">Jawaban</th>
                    </tr>
            </thead>
            <tbody>
{{-- */$y=0;/* --}}
            @foreach($materiquestion as $item)
            {{-- */$y++;/* --}}
                <tr>
                    <td class="text-center num">{{$y}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center">
                    <input type="text" pattern="[1-7]" name="materi[]" value="{{$item->question_value}}" class="form-control"  required>
               </th>                                    
                </tr>
                   <input type="hidden" name="materi_id[]" value="{{$item->id}}">
                @endforeach   
                {{-- */$y++;/* --}}    
         
            </tbody>
        </table> 


        <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">B</th>
                        <th>Waktu</th>
                        <th class="text-center num">Jawaban</th>
                    </tr>
            </thead>
            <tbody>
{{-- */$y=0;/* --}}
            @foreach($waktuquestion as $item)
            {{-- */$y++;/* --}}
                <tr>
                    <td class="text-center num">{{$y}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center"><input type="text"  value="{{$item->question_value}}" pattern="[1-7]" name="waktu[]" class="form-control"  required></th>                                    
                </tr>
                   <input type="hidden" name="waktu_id[]" value="{{$item->id}}">
                @endforeach   
                {{-- */$y++;/* --}}    
            
            </tbody>
        </table> 

 
    
    


        <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center" >C</th>
                        <th class="num">Pengajar</th>
                         <th class="text-center">Pertanyaann</th>  
                        <th class="text-center num" >Jawaban</th>
                                          
                    </tr>
                   
            </thead>
            <tbody>

             {{-- */$x=0;/* --}}
        
                   @foreach($userquestion as $item)
            {{-- */$x++;/* --}}
        
                <tr>
                    <td class="text-center num">{{$x}}</td>
                    <td class="name" >{{$item->name}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center">
                    <input type="text" pattern="[1-7]"  name="pembelajaran[]" class="form-control" value="{{$item->question_value}}"  required></th>       

                    <input type="hidden" name="pembelajaran_id[]" value="{{$item->id}}">                             
                </tr>

  @endforeach           

            </tbody>  
        </table> 
      



         <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">D</th>
                        <th>Kepuasan</th>
                        
                        <th class="text-center" >Ya</th>
                        <th class="text-center">Tidak</th>
                    </tr>
            </thead>
            <tbody>
            {{-- */$m=0;/* --}}
         {{-- */$x=0;/* --}}
                   @foreach($kepuasanquestion as $item)
            {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center num">{{$x}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center" ><input type="radio" @if($item->question_value==1) checked @endif  value="1" name="kepuasan{{$m}}" required></th>
                    <th class="text-center" ><input type="radio"  value="0" @if($item->question_value==0) checked @endif  name="kepuasan{{$m}}"  required></th>          <input type="hidden" name="kepuasan_id[]" value="{{$item->id}}">                            
                </tr>
                 {{-- */$m++;/* --}}
                @endforeach
             
             <tr> {{-- */$x++;/* --}}
                   <td class="text-center num"> {{$x}}</td>
                    <td class="quest">Pesan. Kritik dan Saran</td>      
                    <th class="text-center" colspan="2"><textarea class="form-control" name="advice"></textarea></th>       
                </tr>
            </tbody>
        </table> 
                     

    
                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Save</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                       
@endsection