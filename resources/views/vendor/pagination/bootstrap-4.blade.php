@if ($paginator->hasPages())
    <!--begin:: Components/Pagination/Default-->
    <div class="d-flex flex-wrap py-2 mr-3 align-items-center">
        @if ($paginator->onFirstPage())
            <a aria-disabled="true" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                <i class="ki ki-bold-double-arrow-back icon-xs"></i>
            </a>
            <a aria-disabled="true" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
            
        @else
            <a disabled="disabled" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->url(1) }}"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>
            <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
        @endif

        @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))   
                    <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1"  >...</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                          <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 active" >{{ $page }}</a>    
                        @else
                            <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->url($paginator->total()) }}"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
            @else
                <a aria-disabled="true" aria-label="@lang('pagination.next')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                <a aria-disabled="true" aria-label="@lang('pagination.next')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" ><i class="ki ki-bold-double-arrow-next icon-xs"></i></a> 
            @endif
    </div>
@endif
