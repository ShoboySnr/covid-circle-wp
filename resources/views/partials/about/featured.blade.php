<section id="about-featured">
  <div class="container">
    <div class="about-container table w-full flex-col xl:flex-row">
      <div id="spacing" class="featured-image w-full md:w-1/2">
          <div class="background-image">
          @if(!empty($section_one['introducing_short_video']) || !empty($section_one['introducing_video']))
            @if(!empty($section_one['introducing_short_video']))
              <video src="{{ $section_one['introducing_short_video'] }}" autoplay="" loop="" playsinline="" muted="" style="height: 570px; margin-left: 0px;"></video>
            @endif
            @if(!empty($section_one['introducing_video']))
              <div class="video-cover">
                <svg class="watch-video" video-url="{{ $section_one['introducing_video'] }}" width="68" height="68" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="68" height="68" rx="34" fill="#00b5b4"/><path d="M47.49 34.248l.005-.008L27.977 23l-.005.009a.86.86 0 00-.435-.13.887.887 0 00-.885.882c0 .036.016.066.02.1h-.02V46.34h.02a.875.875 0 00.865.783.857.857 0 00.435-.131l.013.022 19.518-11.238-.013-.022a.87.87 0 00.45-.753.87.87 0 00-.45-.752z" fill="#fff"/></svg>
              </div>
            @endif
          @endif
          </div>
      </div>
      <div class="w-full md:w-1/2 featured-content">
        <div class="content">
          <div class="title">
            <p>{{ $section_one['top_title'] }}</p>
            <h2>{{ $section_one['title'] }}</h2>
          </div>
          <div class="content-details">
            {!! $section_one['content'] !!}
          </div>
        </div>
        @if(!empty($section_one['top_title_2']) || !empty($section_one['title_2']) || !empty($section_one['content_2']))
        <div class="content">
          @if(!empty($section_one['top_title_2']) || !empty($section_one['title_2']))
          <div class="title">
            @if(!empty($section_one['top_title_2']))
              <p>{{ $section_one['top_title_2'] }}</p>
            @endif
            @if(!empty($section_one['title_2']))
              <h2>{{ $section_one['title_2'] }}</h2>
            @endif
          </div>
          @endif
          @if(!empty($section_one['content_2']))
          <div class="content-details">
            {!! $section_one['content_2'] !!}
          </div>
          @endif
        </div>
        @endif
      </div>
    </div>
  </div>
</section>