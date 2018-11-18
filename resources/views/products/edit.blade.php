@extends('layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <a class="btn btn-sm btn-default" href="{{route('product.index')}}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <form method="post" action="{{ route('product.update', [$edit->id]) }}" class="form-horizontal" role="form" >
                    @csrf
                    @method('PATCH')
                    <div class="form-body">

                       

                    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ $edit->name }}" class="form-control" placeholder="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Price<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="price" value="{{ $edit->price }}" class="form-control" placeholder="price">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Type<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="type" name="type" value="{{ $edit->type }}" class="form-control" placeholder="Enter 1 Or 2">
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                         <div class="form-group{{ $errors->has('dep_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">dep_id </label>
                            <div class="col-md-6">

                                <select class="form-control" name="dep_id" >
                                    
                                    @foreach($deps as $deep )
                                    <option value="{{ $edit->dep_id }}" {{ $edit->dep_id == $deep->id ? 'selected' : '' }}>{{ $deep->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('dep_id'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('dep_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    


                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary">Edit <i class="fa fa-edit"></i></button>
                                <a href="{{ route('product.index') }}" class="btn btn-info">cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>





  
@endsection
