

@foreach(session("messages") ?? [] as $message)
    <div class="alert alert-{{ $message["state"] }}">
        @switch($message["state"])
            @case(\App\Http\Constants\MessageState::STATE_DANGER)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3"
                     role="alert">
                    <span class="block sm:inline">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message["content"] ?? "" }}
                    </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>
                @break
            @case(\App\Http\Constants\MessageState::STATE_WARNING)
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-3"
                     role="alert">
                    <span class="block sm:inline">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message["content"] ?? "" }}
                        </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>
                @break
            @case(\App\Http\Constants\MessageState::STATE_INFO)
                <div class="bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 rounded relative mb-3"
                     role="alert">
                    <span class="block sm:inline">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ $message["content"] ?? "" }}
                    </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>
                @break
            @case(\App\Http\Constants\MessageState::STATE_SUCCESS)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3"
                     role="alert">
                    <span class="block sm:inline">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ $message["content"] ?? "" }}
                        </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>
                @break
        @endswitch
    </div>
@endforeach
