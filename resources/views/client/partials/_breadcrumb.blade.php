<section class="c-breadcrumb">
    <div class="box c-breadcrumb__inner">
        <nav class="c-breadcrumb__content">
            <a href="/" class="c-breadcrumb__content__element">Home</a>
            <span class="c-breadcrumb__content__element">/</span>
            @if ($parent)
                <a href="{{ $parent['path'] }}" class="c-breadcrumb__content__element">{{ $parent['title'] }}</a>
                <span class="c-breacrumb__content__element">/</span>
            @endif
            <p class="c-breadcrumb__content__element">{{ $title }}</p>
        </nav>
        <h2 class="c-breadcrumb__title">{{ $title }}</h2>
    </div>
</section>
