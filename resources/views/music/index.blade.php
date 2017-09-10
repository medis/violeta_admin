@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">List of songs</div>
          <div class="col-md-6 text-right">
            <a href="{{ route('music.create') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add song</a>
          </div>
        </div>
    </div>
    <div class="panel-body">
      @if (empty($music))
        <p>No songs yet.</p>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Code</th>
              <th>Type</th>
              <th>Link</th>
              <th>Featured</th>
              <th>Enabled</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($music->items() as $song)
              <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->source }}</td>
                <td>{{ $song->type }}</td>
                <td><a href="{{ $song->getLink() }}" target="_blank"><i class="glyphicon glyphicon-globe"></i></a></td>
                <td><i class="glyphicon {{ $song->featured ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                <td><i class="glyphicon {{ $song->enabled ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                <td>{{ $song->created_at }}</td>
                <td><a href="{{ route('music.edit', $song) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
          {{ $music->links() }}
        </nav>

      @endif
    </div>
</div>

@endsection