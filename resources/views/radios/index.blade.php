@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">List of radios</div>
          <div class="col-md-6 text-right">
            <a href="{{ route('radio.create') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add radio</a>
          </div>
        </div>
    </div>
    <div class="panel-body">
      @if (empty($radios))
        <p>No radios yet.</p>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Link</th>
              <th>Enabled</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($radios->items() as $radio)
              <tr>
                <td>{{ $radio->title }}</td>
                <td><a href="{{ $radio->link }}" target="_blank"><i class="glyphicon glyphicon-globe"></i></a></td>
                <td><i class="glyphicon {{ $radio->enabled ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                <td>{{ $radio->created_at }}</td>
                <td><a href="{{ route('radio.edit', $radio) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
          {{ $radios->links() }}
        </nav>

      @endif
    </div>
</div>

@endsection