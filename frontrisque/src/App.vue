<template>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navpp">
      <router-link to="/" class="nav-link active">
   <img src="./assets/logo.png" alt="">
        </router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <router-link to="/ActifView" class="nav-link active">
          <h6><font-awesome-icon icon="fa-solid fa-user-secret" />Actifs</h6>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/RisqueView" class="nav-link active">
          <h6><font-awesome-icon icon="fa-solid fa-user-secret" />Risque </h6>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/PTRView" class="nav-link active">
          <h6><font-awesome-icon icon="fa-solid fa-user-secret" />PTR </h6>
        </router-link>
      </li>
    </ul>
  </div>
</nav>
    <router-view />
  </div>
</template>

<script>

export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 00px;
}

#app img {
height: 60px;
padding: 0px;
margin: 0px;
cursor: pointer;
}
#navpp h6 {
  margin-top: 20px;
  cursor:pointer;
}
</style>
