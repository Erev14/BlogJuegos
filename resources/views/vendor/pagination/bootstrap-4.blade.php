@if ($paginator->hasPages())
<nav class="pagination is-centered is-rounded" role="navigation">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <button class="pagination-previous" disabled aria-disabled="true" aria-hidden="true" aria-label="@lang('pagination.previous')">
        &lsaquo;
    </button>
    @else
    <a class="pagination-previous pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="pagination-next pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
    @else
    <button class="pagination-next pagination-link" disabled aria-disabled="true" aria-hidden="true" aria-label="@lang('pagination.next')">
        &rsaquo;
    </button>
    @endif


    <ul class="pagination-list" role="navigation">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="pagination-ellipsis" aria-disabled="true">
            <span class="pagination-link">{{ $element }}</span>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li>
            <span class="pagination-link is-current" aria-current="page">{{ $page }}</span>
        </li>
        @else
        <li>
            <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach


    </ul>


</nav>
@endif