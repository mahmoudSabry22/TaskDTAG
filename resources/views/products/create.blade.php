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
                <form method="post" id="ajaxCreate" action="{{ route('product.store') }}" class="form-horizontal" role="form" >
                    @csrf
                    <div class="form-body">




                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name" required>
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
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="price">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


                         <div class="form-group{{ $errors->has('Type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Type<span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <select name="type" id="check" data-dependent="state">
                                    <option value="">select type</option>
                                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    
                                </select>

                                @if ($errors->has('Type'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('Type') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dep_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">dep_id<span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <select name="dep_id" id="deppa">
                                    <option value="">select dep_id</option>
                                    
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
                                <button type="submit" class="btn btn-primary">Add</button>
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
    
        
            



      <script type="text/javascript">

      $('#check').on('change', function(e){
        

        var prov = $(this).val();
        var _token = '{{ csrf_token() }}'; 

        $.ajax({
            url:    '{{ url('admin/ourproduct') }}',
            method: 'POST',
            data:  {
                 prov: prov,
                _token: _token,
            },
            success:function(response){
            
            $('#deppa').empty();
            $.each(response, function(index, value){

             $('#deppa').append('<option value="'+ value.id +'">'+ value.name +'</option>');
            });


            },
            error:function(xhr){
                console.log(xhr);
            }
        })

      });



/*
      $(document).on('submit','#ajaxCreate',function(e){
        e.perventDefault();

        var name = $('#ajaxCreate' '#name').val();
        var price = $('#ajaxCreate' '#price').val();
        var type = $('#ajaxCreate' '#check').val()''
        var dep_id =      

     */ 
  

    </script>
 
@endsection

