@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit Text</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::model($text, ['route' => ['text.update', $text], 'method' => 'put']) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group venue">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group address">
                        {{ Form::label('body', 'Text') }}
                        {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'summernote', 'required']) }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group submit">
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
@endsection