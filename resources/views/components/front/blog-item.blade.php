
    <div class="blog-item">
        <div class="blog-img img-hover_effect">
                {{-- <img
                    src="{{ asset('front/assets/images/blog/1.jpg') }}" alt="Hiraola's Blog Image">
                --}} 
                @if ($blog->media->label == 'image')
                <a href="{{ route('blogs.show',['blog'=>$blog->id]) }}">
                    <img src="{{ asset($blog->path) }}"
                    alt="{{ $blog->title }}">
                </a>
                @else
                <div class="embed-responsive embed-responsive-16by9" style="{{ $type ?? '' }}">
                    <iframe src="{{ $blog->path }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
                @endif
                
            
            <div class="blog-meta-2">
                <div class="blog-time_schedule">
                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                    <span class="month">{{ $blog->created_at->format('F') }}</span>
                </div>
            </div>
        </div>
        <div class="blog-content">
            <div class="blog-heading">
                <h5>
                    <a href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a>
                </h5>
            </div>
            <div class="blog-short_desc">
                {{ Str::limit($blog->description1, 120 ,$end='...')  }}
            </div>
            <div class="hiraola-read-more_area">
                <a href="{{ route('blogs.show',['blog'=>$blog->id]) }}" class="hiraola-read_more">Read More</a>
            </div>
        </div>
    </div>
