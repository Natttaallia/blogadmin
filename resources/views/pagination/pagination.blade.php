<nav class="blog-pagination">

	@if ($paginator->hasMorePages())
		<a class="btn btn-outline-primary" 
		href="{{ $paginator->nextPageUrl() }}"
	>Older</a>
	@else
		<a class="btn btn-outline-primary disabled" href="#">Older</a>
	@endif
		
	@if ($paginator->onFirstPage())
		<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	@else
		<a class="btn btn-outline-secondary" 
		href="{{ $paginator->previousPageUrl() }}"
	>Newer</a>
	@endif
	
</nav>