<li class="nav-item dropdown">

    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge" id="supportcount">{{ $newCount }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    
    @foreach ($messages as $message)
        <div class="media">
            {{-- <img src="dist/img//user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    @if ($message->sender_type == 'user')
                        <a href="{{ route('chat_form' ,$message->sender) }}">
                            {{$name = App\Models\User::where('id' , $message->sender)->first()->name }}
                            {{ $message->receiver }}
                        {{-- </a> --}}
                    @else
                    <a href="{{ route('chat_form' ,  $message->sender) }}">
                        {{ $name = App\Models\Support_Team::where('id' , $message->sender)->first()->name }}
                    </a>
                    @endif
                    {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                </h3>
                <p class="text-sm">{{ $message->message }}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $message->created_at->shortAbsoluteDiffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</div>
</li>
