<!-- Section for activity logs -->
<div class="tab-pane fade show active pt-3" id="log" role="tabpanel" aria-labelledby="log-tab">
  
  <strong>Latest Comments</strong>
  <ul class="timeline">
    @forelse($comments as $comment)
	    <li>
	      <a href="#">{{ $comment->created_at }}</a>
	      <p>{{ $comment->comment }}</p>
	    </li>
    @empty
    	<li>
    		<p>You have no comments</p>
    	</li>
    @endforelse
  </ul>
</div>