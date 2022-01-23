@if ($paginator->lastPage() > 1)
<nav aria-label="Page navigation">
    <ul class="list-pagination-1 pagination border border-color-4 rounded-sm overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2 mb-0">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link border-right rounded-0 text-gray-5" href="{{ $paginator->url(1) }}" aria-label="Previous">
                <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" ><a class="page-link font-size-14" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link border-left rounded-0 text-gray-5" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
@endif