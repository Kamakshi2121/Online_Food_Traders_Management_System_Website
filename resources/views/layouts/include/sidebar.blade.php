<div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          RT
        </a>
        <a href="{{ url('dashboard') }}" class="simple-text logo-normal">
          Ruchit Traders
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::is('dashboard') ? 'active' : '' ; }}">
            <a href="{{ url('dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::is('categories') ? 'active' : '' ; }}">
            <a href="{{ url('categories') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="{{ Request::is('add-category') ? 'active' : '' ; }}" >
            <a href="{{ url('add-category') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Add Category</p>
            </a>
          </li> 
          <li class="{{ Request::is('products') ? 'active' : '' ; }}">
            <a href="{{ url('products') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Products</p>
            </a>
          </li>
          <li class="{{ Request::is('add-products') ? 'active' : '' ; }}" >
            <a href="{{ url('add-products') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Add Products</p>
            </a>
          </li> 
          <li class="{{ Request::is('orders') ? 'active' : '' ; }}">
            <a href="{{ url('orders') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Oredrs</p>
            </a>
          </li>
          <li class="{{ Request::is('users') ? 'active' : '' ; }}">
            <a href="{{ url('users') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
</div>