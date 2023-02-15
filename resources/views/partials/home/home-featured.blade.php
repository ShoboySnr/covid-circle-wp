<section id="home-featured">
  <div class="home-featured-container relative">
    <div class="container">
      <div class="flex justify-start w-full items-start flex-wrap">
        <div class="w-full md:w-1/2">
          <div class="featured-image">
          @if(isset($featured_home['section_one_image']))
            <img src="{{ $featured_home['section_one_image']['url'] }}" title="{{ $featured_home['section_one_image']['title'] }}" alt="{{ $featured_home['section_one_image']['title'] }}" />
          @endif
          </div> 
        </div>
        <div class="w-full md:w-1/2 featured-content">
          <span class="coloured">
            {{ $featured_home['coloured_text'] }}
          </span>
          <div class="content">
            {!! $featured_home['content'] !!}
          </div>
          @if(isset($featured_home['link']['title']))
            <a href="{{ $featured_home['link']['url'] }}" target="{{ $featured_home['link']['target'] }}" class="featured-link">
              <div class="link">
                {{ $featured_home['link']['title'] }}
              </div>
              <svg width="19" height="14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.05.765a.902.902 0 011.276 0l5.41 5.409a.903.903 0 010 1.276l-5.41 5.409a.903.903 0 01-1.276-1.277l4.772-4.77-4.772-4.77a.903.903 0 010-1.277z" fill="#071D6F" stroke="#071D6F"/><path fill-rule="evenodd" clip-rule="evenodd" d="M1 6.812a.901.901 0 01.901-.902h14.295a.902.902 0 010 1.803H1.9A.901.901 0 011 6.812z" fill="#071D6F" stroke="#071D6F"/></svg>
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>