<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="/template/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->       
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/">Trang Chủ</a> </li>
                        
                        
                        <li class="menu-item-has-children">
                          
                            
                                {!! $menusHtml !!}
                           
                        </li>
                        </ul>
                        <li>
                            <a href="{{ route('contact') }}">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 position-relative">
                        @if(Auth::check())
                            <a href="/admin/users/logout">
                                <i class="zmdi zmdi-account" style="color: black;"></i>
                                <span class="stext-101 cl2 hov-cl1 trans-04 position-absolute" style="top: 100%; left: 50%; display: none;">
                                    logout
                                </span>
                            </a>
                            @if(Auth::user()->role === 'admin')
                                <a href="/admin">
                                    <span class="stext-101 cl2 hov-cl1 trans-04 position-absolute admin" style="top: 120%; left: 50%; display: none;">
                                        admin
                                    </span>
                                </a>
                            @endif
                        @else
                            <a href="/admin/users/login">
                                <i class="zmdi zmdi-account" style="color: black;"></i>
                                <span class="stext-101 cl2 hov-cl1 trans-04 position-absolute" style="top: 100%; left: 50%; display: none;">
                                    login
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>

            {!! $menusHtml !!}

            <li>
                <a href="{{ route('contact') }}">Liên Hệ</a>
            </li>
        </ul>
    </div>

    
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
    
    <script>
        document.querySelectorAll('.icon-header-item').forEach(function (element) {
            element.addEventListener('mouseenter', function () {
                this.querySelectorAll('span').forEach(function (span) {
                    span.style.display = 'block';
                });
            });
            element.addEventListener('mouseleave', function () {
                this.querySelectorAll('span').forEach(function (span) {
                    span.style.display = 'none';
                });
            });
        });
    </script>
</header>