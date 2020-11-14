@if ($paginator->hasPages())
    <div class="row tm-row tm-mt-100 tm-mb-75">
        <div class="tm-prev-next-wrapper">
            @if ($paginator->onFirstPage())
                <span class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20">Prev</a>
            @endif

            @if ($paginator->hasMorePages())
                <a class="mb-2 tm-btn tm-btn-primary tm-prev-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            @else
                <span class="mb-2 tm-btn tm-btn-primary disabled tm-prev-next" disabled>Next</span>
            @endif
        </div>

        <div class="tm-paging-wrapper">
            <span class="d-inline-block mr-3">Page</span>
            <nav class="tm-paging-nav d-inline-block">
                <ul>
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="tm-paging-item disabled" aria-disabled="true">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">{{ $element }}</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="tm-paging-item active" aria-current="page">
                                        <a href="#" class="mb-2 tm-btn tm-paging-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="tm-paging-item">
                                        <a href="{{ $url }}" class="mb-2 tm-btn tm-paging-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="tm-paging-item">
                            <a href="{{ $paginator->nextPageUrl() }}" class="mb-2 tm-btn tm-paging-link" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="tm-paging-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="mb-2 tm-btn tm-paging-link disabled" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>                
    </div>
@endif