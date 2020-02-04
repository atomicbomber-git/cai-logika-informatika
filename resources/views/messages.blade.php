@foreach(session("messages") ?? [] as $message)
    <div class="alert alert-{{ $message["state"] }}">
        @switch($message["state"])
            @case("danger")
            @case("warning")
                <i class="fas fa-exclamation-circle mr-2"></i>
                @break
            @case("success")
            @case("info")
                <i class="fas fa-check-circle mr-2"></i>
                @break
        @endswitch

        {{ $message["content"] ?? "" }}
    </div>
@endforeach
