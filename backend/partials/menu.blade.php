        <li class="nav-item">
          <a href="{{ url('mypanel') }}" class="nav-link {{ set_active('mypanel') }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              DASHBOARD
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview {{ set_menu_open('mypanel/website/*') }}">
          <a href="#" class="nav-link {{ set_active('mypanel/website/*') }}">
            <i class="nav-icon fas fa-tv"></i>
            <p>
              WEBSITE
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('mypanel/website/categories') }}" class="nav-link {{ set_active('mypanel/website/categories') }}">
                <i class="far {{ set_icon('mypanel/website/categories') }} nav-icon"></i>
                <p>KATEGORI</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/tag') }}" class="nav-link {{ set_active('mypanel/website/tag') }}">
                <i class="far {{ set_icon('mypanel/website/tag') }} nav-icon"></i>
                <p>TAGS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/post') }}" class="nav-link {{ set_active('mypanel/website/post') }}">
                <i class="far {{ set_icon('mypanel/website/post') }} nav-icon"></i>
                <p>POST</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/page') }}" class="nav-link {{ set_active('mypanel/website/page') }}">
                <i class="far {{ set_icon('mypanel/website/page') }} nav-icon"></i>
                <p>PAGE</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/slider') }}" class="nav-link {{ set_active('mypanel/website/slider') }}">
                <i class="far {{ set_icon('mypanel/website/slider') }} nav-icon"></i>
                <p>SLIDER</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/link') }}" class="nav-link {{ set_active('mypanel/website/link') }}">
                <i class="far {{ set_icon('mypanel/website/link') }} nav-icon"></i>
                <p>LINK</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/sosmed') }}" class="nav-link {{ set_active('mypanel/website/sosmed') }}">
                <i class="far {{ set_icon('mypanel/website/sosmed') }} nav-icon"></i>
                <p>MEDIA SOSIAL</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/photo') }}" class="nav-link {{ set_active('mypanel/website/photo') }}">
                <i class="far {{ set_icon('mypanel/website/photo') }} nav-icon"></i>
                <p>PHOTO GALLERY</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/website/video') }}" class="nav-link {{ set_active('mypanel/website/video') }}">
                <i class="far {{ set_icon('mypanel/website/video') }} nav-icon"></i>
                <p>VIDEO</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ set_menu_open('mypanel/direktori/*') }}">
          <a href="#" class="nav-link {{ set_active('mypanel/direktori/*') }}">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              DIREKTORI
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('mypanel/direktori/kelas') }}" class="nav-link {{ set_active('mypanel/direktori/kelas') }}">
                <i class="far {{ set_icon('mypanel/direktori/kelas') }} nav-icon"></i>
                <p>KELAS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/direktori/tahun-pelajaran') }}" class="nav-link {{ set_active('mypanel/direktori/tahun-pelajaran') }}">
                <i class="far {{ set_icon('mypanel/direktori/tahun-pelajaran') }} nav-icon"></i>
                <p>TAHUN PELAJARAN</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/direktori/staf-pendidik') }}" class="nav-link {{ set_active('mypanel/direktori/staf-pendidik') }}">
                <i class="far {{ set_icon('mypanel/direktori/staf-pendidik') }} nav-icon"></i>
                <p>STAF & TENAGA PENDIDIK</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/direktori/peserta-didik') }}" class="nav-link {{ set_active('mypanel/direktori/peserta-didik') }}">
                <i class="far {{ set_icon('mypanel/direktori/peserta-didik') }} nav-icon"></i>
                <p>PESERTA DIDIK</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/direktori/alumni') }}" class="nav-link {{ set_active('mypanel/direktori/alumni') }}">
                <i class="far {{ set_icon('mypanel/direktori/alumni') }} nav-icon"></i>
                <p>ALUMNI</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ set_menu_open('mypanel/configuration/*') }}">
          <a href="#" class="nav-link {{ set_active('mypanel/configuration/*') }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              KONFIGURASI
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('mypanel/configuration/general') }}" class="nav-link {{ set_active('mypanel/configuration/general') }}">
                <i class="far {{ set_icon('mypanel/configuration/general') }} nav-icon"></i>
                <p>GENERAL</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mypanel/configuration/menu-editor') }}" class="nav-link {{ set_active('mypanel/configuration/menu-editor') }}">
                <i class="far {{ set_icon('mypanel/configuration/menu-editor') }} nav-icon"></i>
                <p>MENU EDITOR</p>
              </a>
            </li>
          </ul>
        </li>