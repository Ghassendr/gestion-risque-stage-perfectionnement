<template>
  <div>
      <router-link :to="'/'">Dashboard</router-link>
      <h1>login</h1>
      <form @submit.prevent="login">
          <input type="email" name="email" v-model="email">
          <input type="password" name="password" v-model="password">
          <button type="submit">Se connecter</button>
      </form>
  </div>
</template>

<script>
// import AuthStore from '../store/authStore.js'
import axios from 'axios'

export default {
  data () {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    login () {
      axios.post('http://127.0.0.1:8000/api/auth/loign', {email: this.email, password: this.password}).then((res) => {
        console.log(res)
      }).catch((error) => {
        console.log(error)
      })
    }
  }
}
</script>
