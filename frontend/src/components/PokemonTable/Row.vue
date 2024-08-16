<script setup>
  defineProps({
    name: String,
    type: String,
    weight: Number,
    height: Number,
  })
</script>

<template>
  <tr>
    <td>{{ name }}</td>
    <td>{{ type }}</td>
    <td>{{ weight }}</td>
    <td>{{ height }}</td>
  </tr>
</template>

<style scoped>

</style>
