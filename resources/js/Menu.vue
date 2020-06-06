<template>
<div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Logo</a>
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <!-- <router-link to = '/admin' class="nav-link">Home</router-link> -->
      </li>
      <li class="nav-item">
        <!-- <router-link to = '/admin/users' class="nav-link">Users</router-link> -->
      </li>
      <li class="nav-item">
        <!-- <router-link to = '/admin/products' class="nav-link">Products</router-link> -->
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          More
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Waiting For New Updates</a>
          <a class="dropdown-item" href="#">Waiting For New Updates</a>
          <a class="dropdown-item" href="#">Waiting For New Updates</a>
        </div>
      </li>
    </ul>
  </nav>
  <router-view></router-view>

<!-- <passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens> -->
  
</div>
</template>
<script >
  export default{
  }
</script>