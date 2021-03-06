<nav class="dashbord-menu__list-nav">
    <ul class="dashbord-menu__list-ul">
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i>HOME</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('habit.create') }}"><i class="far fa-calendar-plus"></i>新しい習慣</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('search.index') }}"><i class="fas fa-search"></i>習慣を検索</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('profile.index') }}"><i class="fas fa-user-edit"></i>プロフィール</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="/like-show"><i class="far fa-heart"></i>お気に入り</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('change.index') }}"><i class="fas fa-key"></i>パスワード変更</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('logout.index') }}"><i class="fas fa-door-open"></i>ログアウト</a></li>
        <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('withdraw.index') }}"><i class="fas fa-sign-out-alt"></i>退会</a></li>
    </ul>
</nav>
