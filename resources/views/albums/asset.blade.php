<div class="col-md-4">
  <div class="card mb-4 box-shadow">
    <img class="card-img-top" src="/{{ unserialize($asset->images)[0] }}" alt="Card image cap">
    <div class="card-body">
      <h5>{{ $asset->title }}</h5>
      <small class="text-muted"><b>Created by</b>: {{ $asset->user->name }}</small>
      <p class="card-text mt-2">{{ substr($asset->caption, 0, 125) }}</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a type="button" href="/albums/{{ $asset->id }}" class="btn btn-sm btn-outline-secondary">View</a>
          @if(Auth::check() and Auth::user()->id == $asset->user_id)
            <form method="POST" action="/albums/{{ $asset->id }}">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
            </form>
          @endif
        </div>
        <small class="text-muted">{{ $asset->created_at->diffForHumans() }}</small>
      </div>
    </div>
  </div>
</div>