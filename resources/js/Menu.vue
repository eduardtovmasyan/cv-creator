<template>
<div>
  <nav v-show="data" class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link to = '/profile' class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to = '/' class="nav-link">Create CV</router-link>
        </li>
        <li class="nav-item">
          <router-link to = '/' class="nav-link">My CV</router-link>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a @click = "logout" class="nav-link">Log Out</a>
        </li>
        <li class="nav-item">
          
        </li>
      </ul>
    </div>
  </nav>
  <router-view></router-view>
</div>
</template>
<script>
export default {
  data() {
    return {
      data: localStorage.getItem('bearerToken')
    }
  },
  methods: {
    logout(e) {
      localStorage.removeItem('bearerToken');
      window.location.href = '/signin';
    },
  }
}
</script>