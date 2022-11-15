@if ($paginator->hasPages())
    <nav aria-label="Table navigation">
        <ul class=" inline-flex items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        <span aria-hidden="true">&lsaquo;</span>
                    </button>

                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"> --}}
                            <li class="active" aria-current="page"><button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">

                                    <span>{{ $page }}</span> </button></li>
                        @else
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                </button>
            @else
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                </button>
            @endif
        </ul>
    </nav>
@endif
