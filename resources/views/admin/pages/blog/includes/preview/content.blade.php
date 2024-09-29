@foreach($post->contentRel as $cont)
    @if($cont->category == 'text')

        <div class="bc_h_edit t-3">
            <div class="edit-icon-w t-3" title="{{__('Uredite tekstualni dio')}}">
                <a href="{{ route('system.blog.text-content.edit', ['id' => $cont->id ]) }}">UREDITE</a>
            </div>

            <h1> {!! nl2br($cont->textRel->text ?? '') !!} </h1>
        </div>

    @elseif($cont->category == 'dobule_images')

        <div class="double-image double-image-bck mt-3">
            <div class="edit-icon-w t-3" title="{{__('Uredite naslov')}}">
                <a href="{{route('system.blog.edit-doubleImages', ['id' => $cont->doubleImagesRel->id ?? '0'] )}}">UREDITE</a>
            </div>
            <div class="single-image">
                <img src="{{asset(($cont->doubleImagesRel->leftImageRel->path ?? '').($cont->doubleImagesRel->leftImageRel->file ?? ''))}}">
            </div>
            <div class="single-image">
                <img src="{{asset(($cont->doubleImagesRel->rightImageRel->path ?? '').($cont->doubleImagesRel->rightImageRel->file ?? ''))}}">
            </div>
        </div>

    @elseif($cont->category == 'slider')
        <div class="single_image-bck mt-4">
            <div class="edit-icon-w t-3" title="{{__('Uredite naslov')}}">
                <a href="{{route('system.blog.slider.edit-slider', ['content' => $cont->id ?? '0'] )}}">UREDITE</a>
            </div>

            <div class="swiper-container swiper-{{$cont->id}}">
                <div class="swiper-wrapper">
                    @foreach($cont->sliderRel as $img)
                        <div class="swiper-slide">
                            <img src="{{asset(($img->imageRel->path ?? '').($img->imageRel->file ?? ''))}}">
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                let swiper_{{$cont->id}} = new Swiper('.swiper-{{$cont->id}}', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }
                });
            </script>
        </div>
    @endif
@endforeach
