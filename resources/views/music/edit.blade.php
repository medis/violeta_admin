@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit song</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::model($music, ['route' => ['music.update', $music], 'method' => 'put']) !!}

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
                        {{ Form::url('source', $music->getLink(), ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group featured">
                        {{ Form::label('featured', 'Featured') }}
                        {{ Form::checkbox('featured') }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group enabled">
                        {{ Form::label('enabled', 'Enabled') }}
                        {{ Form::checkbox('enabled') }}
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

        {{ Form::open(['method' => 'DELETE', 'route' => ['music.destroy', $music->id]]) }}
            <div class="row float-right">
                <div class="col-sm-12">
                    <div class="form-group delete negative-margin">
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection