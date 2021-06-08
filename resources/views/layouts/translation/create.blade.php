@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Орчуулга нэмэх') }}</div>
                <div class="card-body">
                    {!! Form::open(['route' => ['translations.store'],
                     'method' => 'post',
                     'enctype' => 'multipart/form-data']) !!}
                        @csrf
                        <div class="container py-5">
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                        <div class="form-group row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::Label('test_id', 'Тест') !!}
                                            <select class="form-control" name="test_id">
                                                @foreach($assessments as $item)
                                                <option value="{{$item->id}}">{{$item->label}}</option>
                                                @endforeach
                                             </select>
                                            </div>
                                            @foreach($json as $texts)
                                            <div class="col-sm-6">
                                                <label for="en"></label>
                                                <p class="form-control bg-secondary">
                                                    {{ $texts }}
                                                </p>
                                                <input
                                                    placeholder="Текст оруулна уу..."
                                                    type="hidden"
                                                    name="en[]" value="{{ $texts }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="firstname"></label>
                                                <textarea placeholder="Монгол орчуулга оруулна уу..." type="text"
                                                    class="form-control @error('mn') is-invalid @enderror"
                                                    name="mn[]"
                                                    autocomplete="mn" autofocus>aa</textarea>
                                                @error('mn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 float-right">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Хадгалах') }}
                                </button>
                                <a href="{{ route('translations.index') }}" class="ml-1 btn btn-primary">
                                    {{ __('Буцах') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="country"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getstates/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="state"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="state"]').empty();
               }
            });
    });
    </script>

<!-- Initialize the plugin: -->
@endsection
