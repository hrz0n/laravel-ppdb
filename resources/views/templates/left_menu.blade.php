<ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item ">
        <a href="{{route('dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Home</span>
        </a>
    </li>

{{--    This menu only for user level 2 and 3--}}
    @if(\Illuminate\Support\Facades\Auth::user()->level >= 2)
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
{{--        This is menu only for user--}}
    @elseif(\Illuminate\Support\Facades\Auth::user()->level == 1)
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item ">
            <a href="{{route('biodata')}}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Biodata</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('jurusan')}}" class="nav-link">
                <i class="link-icon" data-feather="bookmark"></i>
                <span class="link-title">Jurusan</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('nilai')}}" class="nav-link">
                <i class="link-icon" data-feather="check-square"></i>
                <span class="link-title">Nilai</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('prestasi')}}" class="nav-link">
                <i class="link-icon" data-feather="gift"></i>
                <span class="link-title">Prestasi</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">Dokumen</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="link-icon" data-feather="printer"></i>
                <span class="link-title">Bukti Daftar</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="link-icon" data-feather="message-circle"></i>
                <span class="link-title">Status Lulus</span>
            </a>
        </li>
        <li class="nav-item nav-category">Setting</li>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Akun</span>
            </a>
        </li>
    @endif
</ul>
