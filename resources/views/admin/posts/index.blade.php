<x-admin-master>
    @section('content')
        <h1>All Posts</h1>
        @if(session('message'))
            <div class="alert alert-danger" >{{session('message')}}</div>
            @elseif(session('post-created-message'))
            <div class="alert alert-success" >{{session('post-created-message')}}</div>
            @elseif(session('post-updeted-message'))
            <div class="alert alert-success" >{{session('post-updeted-message')}}</div>
        @endif

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Post DataTable</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>

                </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <th>{{$post->user->name}}</th>
                        <td> <a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a></td>
                        <td><img height="40px" src="{{$post->post_image}}" alt="????"></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <th>

                            @can('view',$post)


                            <form method="post" action="{{route('post.destory',$post->id)}}"  >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>

                            @endcan
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>



    @endsection
</x-admin-master>
