@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2"style="padding-top: 60px">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        @if (Session::has('post_edited'))
                        <div class="alert alert-success"> {{Session::get('post_edited')}}</div>
                        @endif 
                        <form enctype="multipart/form-data" method="post" action= "{{route('post.update' ,[$post->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                              <div class="mb-3">
                                  <label for="title">Post Title</label>
                                  <input type="text" name="title" class="form-control" value="{{$post->title}}"/>
                              </div>  
                              <div class="mb-3">
                                  <label for="body" class="form-control">Post Description</label>
                                      <textarea name="body" class="form-control" id="body" cols="30" rows="10" placeholder="{!!$post->body!!}">{!!$post->body!!}</textarea>
                              </div>

                              <div class="mb-3">
                                <label for="file">Choose File</label>
                                <input type="file" class="form-control" name="file" id="file">
                              </div>
                              <input type="submit" value="Submit" class="btn btn-sm btn-success">
                              <a href="/post" class="btn btn-sm btn-primary" style="float:right";>Back</a> 
                         </form>
                    </div>               
    <script>
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>
                </div>
            </div>
        </div>
    </div>
@endsection