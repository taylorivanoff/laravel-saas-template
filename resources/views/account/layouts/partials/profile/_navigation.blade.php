<ul class="nav flex-column row nav-pills">
    <li class="nav-item">
        <a class="nav-link text-secondary{{ return_if(on_page('account.profile.index'), ' text-dark font-weight-bolder') }}"
           href="{{ route('account.profile.index') }}">
            Profile
        </a>
    </li>
</ul>
