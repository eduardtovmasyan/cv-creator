<template>
<div>
  <nav v-show="token" class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/new-cv">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <!-- <router-link to = '/profile' class="nav-link">Home</router-link> -->
        </li>
        <li class="nav-item">
          <router-link to = '/new-cv' class="nav-link">Create CV</router-link>
        </li>
        <li class="nav-item">
          <router-link to = '/my-cv' class="nav-link">My CV</router-link>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a @click = "logout" class="nav-link" style="cursor: pointer;">Log Out</a>
        </li>
        <li class="nav-item">
          
        </li>
      </ul>
    </div>
  </nav>
  <router-view></router-view>
  <footer v-show="token" class="w3-container w3-teal w3-center w3-margin-top ">
      <p>Find me on social media.</p>
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
      <p>Powered by <a href="https://am.linkedin.com/in/eduard-tovmasyan-661298160" target="_blank">Eduard Tovmasyan</a></p>
    </footer>
</div>
</template>
<script>
    export default {

        data() {
            return {
              token: localStorage.getItem('bearerToken')
            }
        },

        methods: {

          logout(e) {
              this.axios.post('/api/logout', null, {
                  headers: {'Authorization': 'Bearer ' + this.token}
              })
              .then((r) => {
                 localStorage.removeItem('bearerToken');
                  window.location.href = '/signin';
              });     
          },
        }
    }
</script>