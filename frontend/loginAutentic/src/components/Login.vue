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
        name="password"
        id="password"
        v-model.trim="user.password"
        placeholder="sua senha">
    <button type="submit">Login</button>
  </form>
</template>

<script setup>
import http from "@/services/http";
import {reactive} from "vue";
import {useAuth} from "@/stores/auth.js";

const auth = useAuth();

const user = reactive({
  email: 'jeaneverton@gmail.com',
  password: 'teste123'
});

async function login() {
  try {
    const {data} = await http.post('/auth', user);
    console.log(data)
    auth.setUser(data.user)
    auth.setToken(data.token)
  } catch (error) {
    console.log(error?.response?.data)
  }
}
</script>

<style scoped>

</style>