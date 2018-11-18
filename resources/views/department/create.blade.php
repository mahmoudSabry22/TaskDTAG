@extends('layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <a class="btn btn-sm btn-default" href="#"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
            <div class="box-body">

                <form method="post" id="addCatForm" action="{{ route('dep.store') }}" class="form-horizontal" role="form">
                    @csrf
                
                    <div class="form-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Type<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="type" name="type" value="{{ old('type') }}" class="form-control" placeholder="Enter 1 Or 2">
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('dep.index') }}" class="btn btn-info">cancel</a>
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
//     //summary
// image
// description
// parent_id

    function EncodeVar(ar, en) {
        return JSON.stringify({
            'ar' => ar,
            'en' => en,
        });
    }
    
    $(document).on('submit','#addCatForm', function(event){
        event.preventDefault();
        var ar_name = ('#addCatForm #ar_name').val();
        var en_name = ('#addCatForm #en_name').val();
        var keywords = ('#addCatForm #keywords').val();
        var summary = ('#addCatForm #summary').val();
        var description = ('#addCatForm #description').val();
        var image = ('#addCatForm #image').val();
        var parent = ('#addCatForm #parent').val();
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: $(this).attr("action"),
            method:$(this).attr("method"),
            data: {
                name : EncodeVar(ar_name,en_name),
                keywords : keywords,
                summary : summary,
                description : description,
                image : image,
                parent : parent,
                _token : token,

            },
            success : function(res){

            },
            error:function(xhr){

            }
        })
        
    })
</script>

@endsection
