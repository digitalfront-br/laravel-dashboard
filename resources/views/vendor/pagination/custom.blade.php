@if ($paginator->hasPages())
<ul class="pagination">
    @if ($paginator->onFirstPage())
    <li class="paginate_button page-item previous disabled"><span tabindex="0" class="page-link">&nbsp;</span>
    </li>
    @else
    <li class="paginate_button page-item previous"><a href="{{ $paginator->previousPageUrl() }}" tabindex="0"
            class="page-link">&nbsp;</a>
    </li>
    @endif


    @foreach ($elements as $element)

    @if (is_string($element))
    <li class="paginate_button page-item disabled"><a href="#" class="page-link">{{ $element }}</a></li>
    @endif



    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="paginate_button page-item active"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
    @else
    <li class="paginate_button page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach



    @if ($paginator->hasMorePages())
    <li class="paginate_button page-item next"><a href="{{ $paginator->nextPageUrl() }}" tabindex="0"
            class="page-link">&nbsp;</a>
    </li>
    @else
    <li class="paginate_button page-item next disabled"><span tabindex="0" class="page-link">&nbsp;</span>
    </li>
    @endif
</ul>
@endif
