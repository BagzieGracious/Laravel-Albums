<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Image Carousel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div id="Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach(unserialize($asset->images) as $image)
            @if ($loop->first)
              <div class="carousel-item active">
            @else
              <div class="carousel-item">
            @endif
              <img class="d-block w-100" src="/{{ $image }}" alt="{{}}">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#Controls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Controls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      </div>
    </div>
  </div>
</div>