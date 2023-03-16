@if ($paginator->hasPages())
    <div>
        @if(\Request::route()->getName() != "lawyer.community.groups")
            <p class="small text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        @else 
                <br>
        @endif
    </div>
    <div class="text-center  was-validated">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                            <span aria-hidden="true"> <img src="/new-design/assets/images/Vector (2).png" alt="" style="max-width: none;"> </span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"> <img src="/new-design/assets/images/Vector (2).png" alt="" style="max-width: none;"> </span>
                        </a>
                    </li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)">{{$element}}</a>
                        </li>
                    @else 
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">{{$page}}</a>
                                    </li>
                                @else 
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{$page}}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                            <span aria-hidden="true"> <img src="/new-design/assets/images/Vector (3).png" alt="" style="max-width: none;"> </span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            <span aria-hidden="true"> <img src="/new-design/assets/images/Vector (3).png" alt="" style="max-width: none;"> </span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif