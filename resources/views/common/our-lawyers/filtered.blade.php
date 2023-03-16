<ul class="blog-widget blog-wrapper grid grid-3col xl-grid-3col lg-grid-2col md-grid-1col sm-grid-1col xs-grid-1col gutter-double-extra-large">
    <li class="grid-sizer"></li>
    @foreach($lawyers as $k => $lawyer)
        <li class="grid-item wow animate__fadeIn">
            <div class="d-flex box-shadow-medium bg-white padding-30px-all xs-padding-15px-all border-radius-4px">
                <figure class="flex-shrink-0" style="width:140px;height:140px;">
                    <a href="{{route('our-lawyer.details', $lawyer->id)}}">
                        <img src="/storage/{{$lawyer->profile_pic}}" alt="" style="width:140px;height:140px;">
                    </a>
                </figure>
                <div class="media-body flex-grow-1">
                    <a href="blog-masonry.html" class="text-extra-small alt-font d-block margin-5px-bottom">{{$lawyer->emirates}}</a>
                    <a href="blog-post-layout-01.html" class="alt-font font-weight-500 text-extra-dark-gray margin-5px-bottom d-block line-height-22px">{{$lawyer->user->name}}</a>
                    <span class="text-extra-small alt-font"><a href="blog-masonry.html">{{$lawyer->arbitration->area}}</a></span>    
                    <br>                                        
                    <span class="text-extra-small alt-font"><a href="{{route('our-lawyer.details', $lawyer->id)}}" type="button" class="btn btn-primary" style="margin-top:38%;">View</a></span>                                            
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $lawyers->links() }}