@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Шинэ тест') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.test.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Гарчиг') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('Дэлгэрэнгүй') }}</label>

                            <div class="col-md-6">
                                <textarea id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info"  autocomplete="info">{{ old('info') }}</textarea>

                                @error('info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Роль') }}</label>

                            <div class="col-md-6">

                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    @foreach($test_type as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>   

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Үргэлж.хугацаа') }}</label>

                            <div class="col-md-4">     
                                <select name="duration" id="duration" class="form-control @error('type') is-invalid @enderror">
                                    @foreach($durations as $minute)
                                        <option value="{{ $minute }}">{{ $minute }}</option>
                                    @endforeach
                                </select>  

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label">минут.</label>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header"> {{ __('Хэсгийн мэдээлэл') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-1">
                                        <label for="num">#</label>
                                        <div>1</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="company">Гарчиг</label>
                                        <input class="form-control" name="part_title[]" id="company" type="text" placeholder="Гарчиг">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="company">Дэлгэрэнгүй</label>
                                        <textarea id="info" type="text" name="part_info[]" class="form-control @error('info') is-invalid @enderror" name="info" placeholder="Дэлгэрэнгүй">{{ old('info') }}</textarea>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label for="">Үйлдэл</label>
                                        <div>
                                            <a href='' class="btn btn-primary" onclick="alert('hi');
                                            ">Нэмэх</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Хадгалах') }}
                                </button>
                                <a href="{{ route('settings.test') }}" class="ml-1 btn btn-danger">
                                    {{ __('Цуцлах') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
