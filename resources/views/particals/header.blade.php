<header id="header">
    <nav class="navbar navbar-expand-lg  navbar-light fixed-top navbar-white">
        <div class="container">
            <a class="navbar-brand nav-image" href="#">
                <img src="../images/logo.png" alt="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu" id="navbarNavAltMarkup">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Thể loại</a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($category as $cat)
                          <a class="dropdown-item" href="/category-{{$cat->name}}">{{$cat->name}}</a>
                            @endforeach
                          </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Thông tin</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Dịch vụ</a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
</header>