@extends('layout.app')


@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
            </div>

          <div class="box-body">
            <form action="{{ route('destroyed') }}" method="post">
                @csrf
                @method('DELETE')

                <table class="table">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Price</th>
                      <th>Type</th>
                      <th>dep_id</th>
                      
                      
                      <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @if(!$index)

                      <h3>There's Not Product</h3>
                    @endif  
                      @foreach ($index as $i)

                          <tr>
                            
                              <td>{{ $i->name }}</td>
                              <td>{{ $i->price }}</td>
                              <td>{{ $i->type }}</td>
                              <td>{{ $i->theDepartment->name }}</td>
                               
                              
                              <td>
                                  <a href="{{ route('product.show', [$i->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              </td>
                              <td>
                                  <a href="{{ route('product.edit', [$i->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                              </td>
                              <td>
                                  <a href="{{ url('admin/deleteProduct/'.$i->id) }} " class="btn btn-danger"><i class="fa fa-trash"></i></a>
                              </td>
                              <td>
                                <input type="checkbox" name="ids[]" value="{{ $i->id }}">
                              </td>

                          </tr>
                      @endforeach
                      
                  </tbody>
                </table>

                  <button type="submit" style="float: right;margin-left: 10px" name="forcedelete" class="btn btn-danger">Force Delete <i class="fa fa-trash"></i></button>

                  <button type="submit" style="float: right;display: block;" name="delete" class="btn btn-warning">Delete <i class="fa fa-trash"></i></button>

              </form>

              <hr/>
          <div class="trashedData" style="margin-top: 100px">
            <center><h3 style="color: red">Trashed Data</h3></center>
            <form action="{{ route('destroyed') }}" method="post">
                @csrf
                @method('DELETE')

                <table class="table">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Price</th>
                      <th>Type</th>
                      <th>dep_id</th>
                      
                      
                      <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @if(!$index)

                      <h3>There's Not Product</h3>
                    @endif  
                      @foreach ($trashed as $i)

                          <tr>
                            
                              <td>{{ $i->name }}</td>
                              <td>{{ $i->price }}</td>
                              <td>{{ $i->type }}</td>
                              <td>{{ $i->dep_id }}</td>
                               
                              
                              <td>
                                  <a href="{{ route('product.show', [$i->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              </td>
                              <td>
                                  <a href="{{ route('product.edit', [$i->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                              </td>
                              
                              <td>
                                <input type="checkbox" name="ids[]" value="{{ $i->id }}">
                              </td>

                          </tr>
                      @endforeach
                      
                  </tbody>
                </table>

                  <button type="submit" style="float: right;margin-left: 10px" name="forcedelete" class="btn btn-danger">Force Delete <i class="fa fa-trash"></i></button>

                  <button type="submit" style="float: right;display: block;" name="restore" class="btn btn-primary">Restore <i class="fa fa-plus"></i></button>

              </form>
          </div>    
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>


@endsection
