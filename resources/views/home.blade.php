@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <a href="/post/create" class="btn btn-sm btn-secondary"> Create post</a>
                        <h3>your blog post</h3>
                        @if (count($posts)>0)
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    
                                    <th> Actions</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                <tr>
                                        <td> <a href="/post/show/{{$item->id}}">{{$item->title}}</a></td> 
                                        {{-- <td>{!!$item->body!!}</td> --}}
                                        <td>
                                            <a href="/post/{{$item->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('post.delete' ,[$item->id])}}" method="post" class="pull-right">
                                                @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger"> 
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach 
                            </tbody>
                        </table>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
