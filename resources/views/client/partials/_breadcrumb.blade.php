<section class="breadcrumb">
    <div class="box breadcrumb__inner">
        <nav class="breacrumb__content">
            <a href="/" class="breacrumb__content__element">Home</a>
            <span class="breacrumb__content__element">/</span>
            @if ($parent)
                <a href="{{ $parent['path'] }}" class="breacrumb__content__element">{{ $parent['title'] }}</a>
                <span class="breacrumb__content__element">/</span>
            @endif
            <p class="breacrumb__content__element">{{ $title }}</p>
        </nav>
        <h2 class="breadcrumb__title">{{ $title }}</h2>
    </div>
</section>
