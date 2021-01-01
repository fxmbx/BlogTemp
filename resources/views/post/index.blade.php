@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" style="padding-top: 60px">
           <div class="card">

            <div class="card-header">
                Blog Page
                @if(!Auth::guest())
                <a href="/post/create" class="btn btn-sm btn-info" style="float:right;">Add New Post</a>
                @endif
            </div>
                <div class="card-body">
                   
                        @if (count($post)>0) 
                        @foreach ($post as $item)
                        <div class="well">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style="width: 100%;" src="/storage/cover_image/{{$item->cover_image}}" alt="">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="/post/show/{{$item->id}}" class="btn btn-sm btn-secondary">{{$item->title}}</a></h3>
                                    <sub>{{$item->created_at}} by {{$item->user->name}}</sub>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                       
                        @else
                        <p>No post found</p>
                        @endif
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
    
@endsection