@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="padding-top: 60px">
                <div class="card">
                    <div class="card-header">
                       <b> {{$post->title}} </b>
                       <img style="width: 100%;" src="/storage/cover_image/{{$post->cover_image}}" alt="">
                       <br><br>
                       <sub style="float:left;">created on {{$post->created_at}} by {{$post->user->name}}</sub>
                       <sub style="float:right;">edited on {{$post->updated_at}}</sub> <br>
                    </div>
                    <div class="card-body">
                        <p>{!!$post->body!!}</p>
                       

                    </div>
                    <div class="card-footer">
                        <a href="/post"  class="btn btn-sm btn-primary " style="float:right;">Back</a>
                        <span> </span>
                        
                        @if(!Auth::guest())
                            @if(Auth::user()->id ==$post->user_id)
                        <form action="{{route('post.delete' ,[$post->id])}}" method="post" class="pull-right">
                            <a href="/post/{{$post->id}}/edit"  class="btn btn-sm btn-primary" >Edit</a>
                            @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger"> 
                        </form>
                            @endif
                        @endif
                    </div>
                </div>  	
            </div>
        </div>
    </div>
@endsection