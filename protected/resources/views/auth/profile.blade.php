@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">        
                            
                <div class="panel-heading">Profil 
                
                <a href="{{ url('/admin/user/edit/'. Auth::user()->id) }}" class="fa-btn navbar-right">Edit Profile</a>          
                    <div class="panel-body">
                        <strong>
                      @if(Auth::user()->photo==null)
                            <img src="{{ asset('images/user.png') }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @else
                            <img src="{{ asset('images/user/'. Auth::user()->photo) }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @endif                           
                    <p style="text-align:center;">{{Auth::user()->name}}</p>
                    <p style="text-align:center;">{{Auth::user()->username}}</p>
                    <p style="text-align:center;">{{Auth::user()->email}}</p>
                    </div> 
                    </div>
                </div>
            </div>
            </div> 
                    </div> 
                    </div>
                </div>

        </div>      
@endsection