@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Create radio</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::open(['route' => 'radio.store']) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group title">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group source">
                        {{ Form::label('link', 'Link') }}
                        {{ Form::url('link', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group submit">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

    </div>
</div>

@endsection