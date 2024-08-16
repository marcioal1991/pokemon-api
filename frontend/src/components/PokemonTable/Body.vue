<script setup>
import Row from "@/components/PokemonTable/Row.vue";

defineProps({
  rows: Array,
});

</script>

<template>
    <tbody>
        <Row
            v-for="row in rows"
            v-bind:key="row.id"
            :name="row.name"
            :type="row.type"
            :weight="row.weight"
            :height="row.height"
        ></Row>
    </tbody>
</template>
