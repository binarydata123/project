<ul class="blog-overlay-image blog-wrapper grid grid-4col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
    <li class="grid-sizer"></li>
    @foreach($articles as $k => $article)
        <li class="grid-item wow animate__fadeIn" data-wow-delay="0.6s">
            <div class="blog-post bg-white box-shadow-medium border-radius-5px padding-3-half-rem-all xl-padding-2-half-rem-all">
                <div class="blog-post-image">
                    <div class="cover-background h-100 w-100" style="background-image: url(/storage/{{$article->image}})"></div>
                    <div class="blog-overlay-image bg-transparent-gradiant-black"></div>
                </div>
                <div class="post-details">
                    <a  class="blog-category alt-font border-color-medium-gray margin-6-half-rem-bottom">{{$article->category->category}}</a>
                    <a  class="post-date alt-font font-weight-500 text-small text-uppercase d-block" title="">{{$article->created_at->format('d M Y')}}</a>
                    <a href="{{route('legal.article-details', $article->id)}}" class="post-title alt-font text-large font-weight-600 text-dark-slate-blue text-uppercase d-block margin-15px-bottom w-95 sm-w-100">{{$article->title}}</a>
                    <a  class="post-read alt-font font-weight-500 text-extra-small text-uppercase text-black border-bottom border-gradient-sky-blue-pink d-inline-block">By: {{$article->addedBy->name}}</a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{$articles->links()}}