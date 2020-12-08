@if ($paginator->hasPages())
    <!--begin:: Components/Pagination/Default-->
    <ul class="d-flex flex-wrap py-2 mr-3 align-items-center">
        @if ($paginator->onFirstPage())
            <li class="kt-pagination__link--first" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>
            </li>
            <li class="kt-pagination__link--next" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
            </li>
        @else
            <li class="kt-pagination__link--first" disabled="disabled">
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->url(1) }}"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>
            </li>
            <li class="kt-pagination__link--next">
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
            </li>
        @endif

        @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="kt-pagination__link--active">
                        <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1"  >...</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 active">
                                <a>{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="kt-pagination__link--prev">
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                </li>
                <li class="kt-pagination__link--last">
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->url($paginator->total()) }}"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                </li>
            @else
                <li class="kt-pagination__link--prev" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                </li>
                <li class="kt-pagination__link--last" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" ><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                </li>
            @endif
    </ul>
@endif
