            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">BERANDA
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @php
                    $menu = DB::table('menu')->whereNull('menu_sub')->orderBy('menu_id','ASC')->get();
                @endphp
                @foreach($menu as $mn)
                @php 
                    $ids = $mn->menu_id;
                    $ceksub = DB::table('menu')->whereNotNull('menu_sub')->where('menu_sub',$ids)->orderBy('menu_id','ASC')->count(); 
                @endphp
                @if($ceksub > 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ FunctionStatic::url_menu($mn->menu_id) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $mn->menu_title }}
                    </a>
                    @php
                        $idsub = $mn->menu_id;
                        $sub = DB::table('menu')->whereNotNull('menu_sub')->where('menu_sub',$idsub)->orderBy('menu_id','ASC')->get();
                    @endphp
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($sub as $subs)    
                        <a class="dropdown-item" href="{{ FunctionStatic::url_menu($subs->menu_id) }}">{{ $subs->menu_title }}</a>
                        @endforeach
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ FunctionStatic::url_menu($mn->menu_id) }}">
                    {{ $mn->menu_title }}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>