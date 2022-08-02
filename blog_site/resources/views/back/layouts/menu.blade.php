 
<body id="page-top"> 
    <div id="wrapper"> 
      
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> 

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"> 
                <div class="sidebar-brand-text">Blog Sitesi Admin</div>
            </a> 

            <hr class="sidebar-divider my-0"> 
            <hr class="sidebar-divider">
 
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Panel Hakkında</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> 
                        <a class="collapse-item" href="{{route('admin.kullanici')}}">Panel Kullanıcıları</a> 
                    </div>
                </div>
            </li> 
            <hr class="sidebar-divider"> 




            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>İletilenler</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> 
                        <a class="collapse-item" href="{{route('admin.seemesaj')}}">Mesajlar</a>
                        <a class="collapse-item" href="{{route('admin.commentPage')}}">Yorumlar</a>
                    </div>
                </div>
            </li>




            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Site Hakkında</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> 
                        <a class="collapse-item" href="{{route('admin.kategori')}}">Kategoriler</a>
                        <a class="collapse-item" href="{{route('admin.yaziopen')}}">Yazılar</a> 
                        <a class="collapse-item" href="{{route('admin.iletisim')}}">İletişim Bilgileri</a>  
                    </div>
                </div>
            </li>

          
           

        </ul>
        
        <div id="content-wrapper" class="d-flex flex-column"> 
           
            <div style="margin-top: 20px;" id="content"> 
                <div class="container-fluid">  
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <a href="{{route('admin.login.out')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                         ></i>Çıkış Yap</a>
                    </div>

         