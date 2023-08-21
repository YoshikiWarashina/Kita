<nav aria-label="...">
    <ul class="pagination justify-content-center pt-3">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link text-success border-success" aria-label="前">
                    Previous
                </span>
            </li>
        @else
            <li class="page-item text-success border-success">
                <a class="page-link text-success border-success" href="{{ $paginator->previousPageUrl() }}" aria-label="前">
                    Previous
                </a>
            </li>
        @endif

        @php
            $startPage = max(1, $paginator->currentPage() - 1);
            $endPage = min($startPage + 2, $paginator->lastPage());
        @endphp

        @for ($page = $startPage; $page <= $endPage; $page++)
            <li class="page-item{{ $paginator->currentPage() == $page ? ' active' : '' }}">
                <a class="page-link border-success text-success{{ $paginator->currentPage() == $page ? ' bg-success text-white' : '' }}" href="{{ $paginator->url($page) }}">{{ $page }}</a>
            </li>
        @endfor

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link text-success border-success" href="{{ $paginator->nextPageUrl() }}" aria-label="次">
                    Next
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link text-success border-success" aria-label="次">
                    Next
                </span>
            </li>
        @endif
    </ul>
</nav>
