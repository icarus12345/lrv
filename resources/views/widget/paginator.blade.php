<p class="showing">Showing {{$paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1}} - {{min(($paginator->currentPage()) * $paginator->perPage(), $paginator->total())}} of {{$paginator->total()}} items</p>
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="fa fa-angle-left"></i>Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i>Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next<i class="fa fa-angle-right"></i></a></li>
        @else
            <li class="disabled"><span>Next<i class="fa fa-angle-right"></i></span></li>
        @endif
    </ul>
@endif