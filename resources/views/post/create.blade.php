@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2"style="padding-top: 60px">
                <div class="card">
                    <div class="card-header">
                        Add Post
                    </div>
                    <div class="card-body">
                        @if (Session::has('post_added'))
                        <div class="alert alert-success"> {{Session::get('post_added')}}</div>
                            
                        @endif
                        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                              <div class="mb-3">
                                  <label for="title">Post Title</label>
                                  <input type="text" name="title" class="form-control" placeholder="Enter Post Title"/>
                              </div>  
                              <div class="mb-3">
                                  <label for="body" class="form-control">Post Description
                                </label>
                                      <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                              </div>
  
                              
                              
                              <div class="mb-3">
                                  <label for="file">Choose File</label>
                                  <input type="file" class="form-control" name="file" id="file">
                                </div>
                                
                                <input type="submit" value="Submit" class="btn btn-success">
                                <a href="/post" class="btn btn-primary" style="float:right";>Back</a> 
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