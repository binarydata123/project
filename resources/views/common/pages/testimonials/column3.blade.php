@foreach($testimonials as $k => $testimonial)
    @if(++$key % 3 == 0)
        <div class="message-card-wraper">
            <p>"{{$testimonial->message}}”.</p>
            <div class="message-card-description">
                <div class="img-description">
                    <img src="/new-design/assets/image/home/Ellipse 1.png" alt="">
                    <div class="">
                        <h5>{{$testimonial->name}}</h5>
                        <h6>{{$testimonial->emirate}}</h6>
                    </div>

                </div>
                <div class="ratings">
                    <div class="ratings-card">
                        <img src="/new-design/assets/image/home/star.png" alt="">
                        <img src="/new-design/assets/image/home/star.png" alt="">
                        <img src="/new-design/assets/image/home/star.png" alt="">
                        <img src="/new-design/assets/image/home/star.png" alt="">
                        <img src="/new-design/assets/image/home/star.png" alt="">
                    </div>
                    <h5>{{$testimonial->created_at->format('d M Y')}}</h5>
                </div>
            </div>
        </div>
    @endif
@endforeach