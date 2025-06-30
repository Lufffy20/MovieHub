@include('layout.header')

@php
    use Illuminate\Support\Str;

    // Decode screenshots JSON (if any)
    $screens = is_array($movie->screenshots)
        ? $movie->screenshots
        : json_decode($movie->screenshots, true);
@endphp

<div class="container my-5 text-white">
    <h2 class="mb-3">{{ $movie->title }}</h2>

    <div class="row">
        <div class="col-md-5">
            {{-- ✅ Fixed-size Poster Box with Cover Image --}}
            <div style="width: 100%; height: 400px; overflow: hidden; border-radius: 10px;">
                <img src="{{ asset('images/' . $movie->image) }}"
                     alt="{{ $movie->title }}"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-7">
            <h4>Description</h4>
            <p>{!! nl2br(e($movie->description)) !!}</p>

            <h4>Story</h4>
            <p>{{ $movie->story ?? 'Not available' }}</p>

            <h4>Cast</h4>
            <p>{{ $movie->cast ?? 'Not available' }}</p>

            <h4>IMDb Rating</h4>
            <p>{{ $movie->imdb_rating ?? 'N/A' }}</p>

            <h4>Review</h4>
            <p>{{ $movie->review ?? 'N/A' }}</p>
        </div>
    </div>

    {{-- ✅ Screenshots --}}
    @if(!empty($screens))
        <div class="mt-5">
            <h4>Screenshots</h4>
            <div class="row">
                @foreach($screens as $shot)
                    <div class="col-md-4 my-2">
                        <img src="{{ asset('images/screenshots/' . $shot) }}" class="img-fluid rounded shadow" alt="screenshot">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ✅ Download Section --}}
    <div class="mt-5">
        <h4>Download Movie</h4>
        <div class="btn-group flex-wrap gap-2" role="group" aria-label="Download Options">

            @if($movie->download_4k)
                <a href="{{ Str::startsWith($movie->download_4k, 'http') ? $movie->download_4k : asset($movie->download_4k) }}"
                   class="btn btn-danger"
                   {{ Str::startsWith($movie->download_4k, 'http') ? 'target=_blank' : 'download' }}>
                    🎥 4K
                </a>
            @endif

            @if($movie->download_1080p)
                <a href="{{ Str::startsWith($movie->download_1080p, 'http') ? $movie->download_1080p : asset($movie->download_1080p) }}"
                   class="btn btn-primary"
                   {{ Str::startsWith($movie->download_1080p, 'http') ? 'target=_blank' : 'download' }}>
                    🎥 1080p
                </a>
            @endif

            @if($movie->download_720p)
                <a href="{{ Str::startsWith($movie->download_720p, 'http') ? $movie->download_720p : asset($movie->download_720p) }}"
                   class="btn btn-success"
                   {{ Str::startsWith($movie->download_720p, 'http') ? 'target=_blank' : 'download' }}>
                    🎥 720p
                </a>
            @endif

            @if($movie->download_480p)
                <a href="{{ Str::startsWith($movie->download_480p, 'http') ? $movie->download_480p : asset($movie->download_480p) }}"
                   class="btn btn-warning"
                   {{ Str::startsWith($movie->download_480p, 'http') ? 'target=_blank' : 'download' }}>
                    🎥 480p
                </a>
            @endif

        </div>
    </div>
</div>

@include('layout.footer')
