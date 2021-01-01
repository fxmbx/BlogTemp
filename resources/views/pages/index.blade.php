@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="padding-top: 60px">
            <div class="card bg-light text-center">
                <div class="card-header">

            @if(!Auth::guest())
                   <h3> Welcome to Back {{auth()->user()->name}}</h3>
                     </div>
                     <div class="card-body">
                    <p>Great Exploits from here onward my g</p>
                    <p><a href="/login" role="button" class="btn btn-secondary">Go to your Dashobard</a></p>
                </div>
               
            @else
                <h3> Welcome to FunNotSoFun <br> </h3>
                </div>
                <div class="card-body">
                    <p>Great Exploits from here onward my g</p>
                    <p><a href="/login" role="button" class="btn btn-secondary">Login</a><span> </span><a href="/register" class="btn btn-primary" role="button">Register</a></p>
                </div>
                </div>
            @endif

        </div>
    </div>
</div>

@endsection                        
    
