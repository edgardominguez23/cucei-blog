<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="../assets/img/logo-small.png">
        </div>
        <!-- <p>CT</p> -->
      </a>
      <a href="https://www.creative-tim.com" class="simple-text logo-normal">
        CUCEI-Blog
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="{{Request::path() == 'dashboard/post' ? 'active' : ''}}">
            <a href="{{route('post.index')}}">
              <i class="nc-icon nc-paper"></i>
              <p>Posts</p>
            </a>
        </li>
        <li class="{{Request::path() == 'dashboard/category' ? 'active' : ''}}">
          <a href="{{route('category.index')}}">
            <i class="nc-icon nc-layout-11"></i>
            <p>Categorias</p>
          </a>
        </li>
        <li class="{{Request::path() == 'dashboard/user' ? 'active' : ''}}">
            <a href="{{route('user.index')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Usuarios</p>
            </a>
        </li>
        <li class="{{Request::path() == 'dashboard/contact' ? 'active' : ''}}">
            <a href="{{route('contact.index')}}">
              <i class="nc-icon nc-badge"></i>
              <p>Contactos</p>
            </a>
          </li>
        <li class="active-pro">
          <a href="./upgrade.html">
            <i class="nc-icon nc-spaceship"></i>
            <p>Upgrade to PRO</p>
          </a>
        </li>
      </ul>
    </div>
</div>