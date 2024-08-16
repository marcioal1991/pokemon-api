<script setup>
import Head from "@/components/PokemonTable/Head.vue";
import Body from "@/components/PokemonTable/Body.vue";

defineProps({
  items: Array,
});

</script>

<template>
  <table class='table is-bordered'>
    <Head />
    <Body :rows="items" />
  </table>
</template>

<style scoped>

</style>
