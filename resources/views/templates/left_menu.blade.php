<ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item ">
        <a href="{{route('dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Home</span>
        </a>
    </li>
    <li class="nav-item nav-category">Master Data</li>
    <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Users</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="users">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Biodata</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Akun</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a href="#" class="nav-link">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">Program Studi</span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#" class="nav-link">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">Bidang Studi</span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#" class="nav-link">
            <i class="link-icon" data-feather="printer"></i>
            <span class="link-title">Laporan</span>
        </a>
    </li>
</ul>
