

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



            </tbody>
        </table> 
    





            <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">A</th>
                        <th>Materi</th>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>                          
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                        <th class="text-center">5</th>
                        <th class="text-center">6</th>
                        <th class="text-center">7</th>
                    </tr>
            </thead>
            <tbody>

           

           {{-- */$x=0;/* --}}
                   @foreach($userquestion as $item)
            {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center num">{{$x}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center"><input type="radio"  value="1" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="2" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="3" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="4" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="5" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="6" name="q{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="7" name="q{{$x}}"  required></th>
                     <input type="hidden" name="q_id[]" value="{{$item->id}}">                                    
                </tr>
                @endforeach
           
            </tbody>
        </table> 

        {{-- */$x=0;/* --}}
            @foreach($user as $item)
                {{-- */$x++;/* --}}

        <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num" rowspan="2">C</th>
                        <th class="text-center quest" rowspan="2">Pengajar {{$x}}</th>
                        <input type="hidden" name="userid[]" value="{{$item->userid}}">
                        <th class="text-center" colspan="7">{{$item->name}}</th>                     
                    </tr>
                    <tr>                        
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>                          
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                        <th class="text-center">5</th>
                        <th class="text-center">6</th>
                        <th class="text-center">7</th>
                    </tr>
            </thead>
            <tbody>
        
          {{-- */$x=0;/* --}}
                   @foreach($userquestion as $item)
            {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center num">{{$x}}</td>
                    <td class="quest" >{{$item->question}}</td>
                    <th class="text-center"><input type="radio"  value="1" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="2" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="3" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="4" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="5" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="6" name="q7{{$x}}"  required></th>
                    <th class="text-center"><input type="radio"  value="7" name="q7{{$x}}"  required></th>
                </tr>
                @endforeach
            </tbody>
        </table> 
        @endforeach

        <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">A</th>
                        <th>Materi</th>
                        
                        <th class="text-center" colspan="3">Ya</th>
                        <th class="text-center" colspan="4">Tidak</th>
                    </tr>
            </thead>
            <tbody>
        
                <tr>
                    <td class="text-center num">1</td>
                    <td class="quest" >Apakah anda puas dengan kursus ini?</td>
                    <th class="text-center" colspan="3.5"><input type="radio"  value="1" name="q19" required></th>
                    <th class="text-center" colspan="3.5"><input type="radio"  value="0" name="q19"  required></th>                                  
                </tr>
                 <tr>
                   <td class="text-center">2</td>
                    <td class="quest">Apakah anda berminat mengikut kursus serupa dimasa mendatang?</td>      
                    <th class="text-center" colspan="3"><input type="radio" value="1" name="q20"  required></th>
                    <th class="text-center" colspan="4"><input type="radio" value="0" name="q20"  required></th>             
                </tr>
                <tr>
                   <td class="text-center">3</td>
                    <td class="quest">Apakah anda puas dengan pelayanan staff ULC?</td>      
                    <th class="text-center" colspan="3"><input type="radio" value="1" name="q21"  required></th>
                    <th class="text-center" colspan="4"><input type="radio" value="0" name="q21"  required></th>            
                </tr>
                <tr>
                   <td class="text-center">3</td>
                    <td class="quest">Pesan. Kritik dan Saran</td>      
                    <th class="text-center" colspan="7"><textarea class="form-control" name="advice"></textarea></th>          
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