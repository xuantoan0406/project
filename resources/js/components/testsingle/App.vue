<template>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <div class="navbar-brand">
          <router-link :to="{ name: 'home' }">Laravel</router-link>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="nav-link">
                <router-link :to="{ name: 'register' }">Register</router-link>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link">
                <router-link :to="{ name: 'login' }">Login</router-link>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      test: "1"
    };
  },
  method: {}
};
</script>