<script setup>
import axios from 'axios';
import {onMounted, ref} from 'vue';
import Table from "@/components/PokemonTable/Table.vue";
import Pagination from "@/components/PokemonTable/Pagination.vue";

const pokemons = ref([]);
const previous = ref(null);
const next = ref(null);
const loading = ref(false);
const currentPage = ref(0);
const totalPages = ref(0);

async function paginate(url) {
  pokemons.value = [];
  loading.value = true;

  // Poderia criar um Api.js ou uma estrutura para controlar essas requisições, mas como é só para realizar a paginação da tabela
  // não vi necessidade, pois esta sendo utilizado a própria paginação fornecida da api do laravel
  await axios.get(url).then(function (results) {
    next.value = results.data.links.next;
    previous.value = results.data.links.prev;
    totalPages.value = results.data.meta.last_page
    currentPage.value = results.data.meta.current_page

    results.data.data.forEach(function (item) {
      pokemons.value.push(item);
    });
  }).finally(() => {
    loading.value = false;
  });
}

onMounted(() => {
  paginate('/pokemons');
});

</script>

<template>
  <div class='container has-text-centered'>
    <div class='columns is-mobile is-centered'>
      <div class='column is-12'>
        <div>
          <h1 class='title'>Pokemons</h1>
          <hr>
        </div>
        <Table class="container" :items="pokemons"/>
        <Pagination
                  :loading="loading"
                    @paginate="paginate"
                    :next="next"
                    :current-page="currentPage"
                    :total-pages="totalPages"
                    :previous="previous"/>
      </div>
    </div>
  </div>
</template>

<style scoped>

h1 {
  margin-bottom: 20px;
}

.table td {
  font-size: 17px
}

.table th {
  font-size: 17px
}
</style>
