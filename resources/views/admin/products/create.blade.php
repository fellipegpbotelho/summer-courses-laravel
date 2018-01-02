@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => route('admin.products.store'), 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nome</label><br>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                    <label for="amount" class="col-md-4 control-label">Preço</label><br>

                    <div class="col-md-12">
                        <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>

                        @if ($errors->has('amount'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Descrição</label><br>

                    <div class="col-md-12">
                        <textarea name="description" id="description" class="form-control" required autofocus>{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-md-4 control-label">Imagem</label><br>

                    <div class="col-md-12">
                        {!! Form::file('image', ['class' => 'image']) !!}

                        @if ($errors->has('image'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success btn-md">Salvar</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-md">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
