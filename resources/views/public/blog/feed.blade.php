{{-- No generator for raw XML views; created by hand at resources/views/public/blog/feed.blade.php --}}
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>{{ \App\Models\Setting::get('site_name') }} Blog</title>
        <link>{{ route('blog.index') }}</link>
        <description>{{ \App\Models\Setting::get('hero_subheadline') }}</description>
        <language>en-us</language>
        <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>
        @foreach ($posts as $post)
            <item>
                <title>{{ $post->title }}</title>
                <link>{{ route('blog.show', $post) }}</link>
                <guid>{{ route('blog.show', $post) }}</guid>
                <description>{{ $post->excerpt }}</description>
                <pubDate>{{ optional($post->published_at)->toRssString() }}</pubDate>
                @if ($post->category)
                    <category>{{ $post->category->name }}</category>
                @endif
            </item>
        @endforeach
    </channel>
</rss>