<script setup>
import axios from 'axios';
import { ref } from 'vue';

const pokemons = ref([]);

axios.get('http://localhost:8000/pokemons').then(function (results) {
  console.log(results)
  results.data.data.forEach(function (item) {
    pokemons.value.push(item);
  });
});


</script>

<template>
  <header>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Peso (g)</th>
          <th>Altura (m)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="pokemon in pokemons">
          <th>{{ pokemon.name }}</th>
          <th>{{ pokemon.type }}</th>
          <th>{{ pokemon.weight }}</th>
          <th>{{ pokemon.height }}</th>
        </tr>
      </tbody>
    </table>

  </header>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
