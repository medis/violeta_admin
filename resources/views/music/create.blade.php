@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Create song</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::open(['route' => 'music.store']) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group title">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group type">
                        {{ Form::label('type', 'Type') }}
                        {{ Form::select('type', $types, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group source">
                        {{ Form::label('source', 'Link') }}
                        {{ Form::url('source', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group featured">
                        {{ Form::label('featured', 'Featured') }}
                        {{ Form::checkbox('featured') }}
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