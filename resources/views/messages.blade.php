@foreach(session("messages") ?? [] as $message)
    <div class="alert alert-{{ $message["state"] }}">
        @switch($message["state"])
            @case(\App\Http\Constants\MessageState::STATE_DANGER)
            @case(\App\Http\Constants\MessageState::STATE_WARNING)
                <i class="fas fa-exclamation-circle mr-2"></i>
                @break
            @case(\App\Http\Constants\MessageState::STATE_INFO)
            @case(\App\Http\Constants\MessageState::STATE_SUCCESS)
                <i class="fas fa-check-circle mr-2"></i>
                @break
        @endswitch
        {{ $message["content"] ?? "" }}
    </div>
@endforeach
