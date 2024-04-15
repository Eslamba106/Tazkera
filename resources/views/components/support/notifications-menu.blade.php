<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ $newCount }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @if($newCount)<span class="dropdown-header">{{ $newCount }} Notifications</span>@endif

        @foreach ($notifications as $notification)
            
        <div class="dropdown-divider"></div>
        <a href="{{ $notification->url }}?notification_id={{ $notification->id }}" class="dropdown-item col-12 text-truncate @if($notification->unread())text-bold @endif">
            <i class="{{ $notification->data['icon'] ?? "fas fa-users" }} mr-2"></i> {{ $notification->data['body'] }}
            <span class="float-right text-muted text-sm">{{ $notification->created_at->shortAbsoluteDiffForHumans() }}</span>
        </a>
        @endforeach

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>