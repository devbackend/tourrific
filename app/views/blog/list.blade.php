<div class="wrapper">
@forelse($blogList as $blog)
      <div class="blog_element">
        <div class="blog_image">
            <img src="{{ $blog->image }}" alt="{{ $blog->title }}" />
        </div>
        <div class="blog_content">
            <div class="blog_date">12.10.2014</div>
            <div class="blog_title">{{ $blog->title }}</div>
            <div class="blog_preview">{{ $blog->preview }}</div>
        </div>
        <div class="blog_under"></div>
      </div>
@empty
      <h3>Новых блогов не обнаружено</h3>
@endforelse
</div>