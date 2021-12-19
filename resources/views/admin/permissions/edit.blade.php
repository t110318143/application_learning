<x-admin-master>
    @section('content')

        <div class="row">
        <div class="col-sm-3">
        <h1>Edit : {{$permissions->name}}</h1>
        <form method="post" action="{{route('permissions.update',$permissions->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$permissions->name}}" >
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
        </div>
    @endsection
</x-admin-master>
