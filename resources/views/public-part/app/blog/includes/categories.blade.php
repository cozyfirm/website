<div class="categories-part">
    <h5>KATEGORIJE</h5>

    <!-- Categories values -->

    @foreach($categories as $category)
        <a href="{{route('public-part.blog.with-categories', ['id' => $category->id])}}">
            <div class="category-row">
                <div class="text-part">
                    <p> {{ $category->title ?? '' }} </p>
                </div>
                <div class="number-of-it"> {{ isset($category->postRel) ? $category->postRel->count() : '' }} </div>
            </div>
        </a>
    @endforeach


    <div class="categories-break-line"></div>

    <h5> {{__('POPULARNO')}} </h5>

    <div class="recent-posts">
        @foreach($popular as $post)
            <a href="{{route('public-part.blog.preview', ['id' => $post->id ])}}">
                <div class="recent-post">
                    <div class="image-part">
                        <img src="{{ asset($post->imageObject()) }}" alt="">
                    </div>
                    <div class="text-part">
                        <h5> {{ $post->title ?? '' }} </h5>
                        <span> {{$post->created_at->format('d.M.Y H:i') }} </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="categories-break-line"></div>

    <h5>{{ __('KLJUČNE RIJEČI') }}</h5>
    <div class="tags-wrapper">
        @foreach($popularTags as $tag)
            <div class="tag">
                <a href="{{ route('public-part.blog.tag', ['tag' => str_replace('#', '', $tag->tag ?? '')]) }}">{{ $tag->tag ?? '' }}</a>
            </div>
        @endforeach
    </div>
</div>
