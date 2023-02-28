<template>
  <h1>Login</h1>
  <form @submit.prevent="login">
    <input
        type="email"
        name="email"
        id="email"
        v-model.trim="user.email"
        placeholder="seu email">
    <input
        type="password"
        name="senha"
        id="senha"
        v-model.trim="user.senha"
        placeholder="sua senha">
    <button type="submit">Login</button>
  </form>
</template>

<script>
import http from "@/services/http";
export default {
  name: "Login",
  data () {
    return {
      user: [
        {email: ''},
        {senha: ''}
      ]
    }
  },
  methods: {
    async login() {
      try {

        const data = {
          email: this.user.email,
          senha: this.user.senha
        };

       const {rest} = await http.post('/auth', data);
       console.log(rest)
      } catch (error) {
        console.log(error?.response?.data)
      }
    }
  }
}
</script>

<style scoped>

</style>