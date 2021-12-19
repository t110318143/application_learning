<x-admin-master>
@section('content')



<div class="row">
    <div class="col-sm-3">
        <h1>Edit Role : {{$role->name}}</h1>
        <form method="post" action="{{route('roles.update',$role->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$role->name}}" >
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        @if($permissions->isNotEmpty())
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Options</th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Attach</th>
                  <th>Detach</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Options</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td><input type="checkbox"
                        @foreach($role->permissions as $role_permission)
                             @if($role_permission->slug == $permission->slug)
                                checked
                             @endif
                        @endforeach
                        ><td>{{$permission->id}} </td>
                        <td>  <a href="{{route('roles.edit',$permission->id)}}"> {{$permission->name}}  </a></td>
                        <td>{{$permission->slug}}</td>
                        <td>
                            <form method="post" action="{{route('role.permission.attach',$role)}}">
                                @csrf
                                @method('PUT')

                            <input type="hidden" name="permission" value="{{$permission->id}}" >


                                <button type="submit"
                                        class="btn btn-primary"
                                        @if($role->permissions->contains($permission))
                                            disabled
                                        @endif
                                        >Attach</button></td>
                            </form>

                            <td>
                            <form method="post" action="{{route('role.permission.detach',$role)}}">
                                @csrf
                                @method('PUT')

                            <input type="hidden" name="permission" value="{{$permission->id}}" >


                            <button type="submit"
                                    class="btn btn-danger"
                                    @if(!$role->permissions->contains($permission))
                                            disabled
                                        @endif

                            >Detach</button>
                            </form>
                        </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
</div>
@endsection
</x-admin-master>
