@if ($paginator->hasPages())
    <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only" aria-hidden="true">&lsaquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only" aria-hidden="true">&lsaquo;</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">
                            <i class="fas fa-angle-right"></i>
                             <span class="sr-only">&rsaquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a class="page-link" href="#" tabindex="-1">
                        <span aria-hidden="true">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">&rsaquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
