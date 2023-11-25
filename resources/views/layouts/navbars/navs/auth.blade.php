<style>
.navbar {
    background-color: #0f0f0f;
    color: #fff;
}

#searchbar::placeholder {
    color: #FFF;
}

#searchbar {

    margin: 0px;
    padding: 0px;
    width: 99%;
    outline: none;
    height: 43px;
    color: #FFF;
    background-color: #0F0F0F;
    border: 1px solid white;
    border-radius: 30px 0 0 30px;
    padding-left: 10px;

}

#clear {
    position: absolute;
    top: 0;

    right: 0px;
    z-index: 2;
    border: none;
    top: 2px;
    height: 40px;
    cursor: pointer;
    color: white;
    background-color: #1e90ff;
    transform: translateX(2px);
    margin-right: 7px;
    background-color: #FFF;
    color: #0F0F0F;
    width: 60px;
}

.buttonIn {

    position: relative;
    margin-left: 450px;
    margin-top: 23px;
    width: 500px;
    height: 50px;


}
</style>
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}"> {{__('Youtuch') }} </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">

                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="notification">5</span>
                        <span class="d-lg-none">{{ __('Notification') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">{{ __('Notification 1') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Notification 2') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Notification 3') }}3</a>
                        <a class="dropdown-item" href="#">{{ __('Notification 4') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Another notification') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Another notification') }}</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- Barra de búsqueda -->

                    <!-- <input class="form-control mr-sm-2 " type="search" placeholder="{{ __('Search') }}"
                            aria-label="{{ __('Search') }}" id="searchbar"> -->
                    <div class="buttonIn">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="search" class="mr-sm-2" placeholder="{{ __('Search') }}"
                                aria-label="{{ __('Search') }}" name="query" id="searchbar">
                            <button type="submit" id="clear"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                </li>
            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">{{ __('Account') }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Dropdown') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Something') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a>
                    </div>
                </li>
                <li class="nav-item mt-3">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>