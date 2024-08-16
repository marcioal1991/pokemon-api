<script setup>
  import {computed} from "vue";

  const props = defineProps({
    previous: [null, String],
    next: [null, String],
    loading: Boolean,
    totalPages: Number,
    currentPage: Number
  });
  const emit = defineEmits(['paginate']);
  const previousIsDisabled = computed(() => props.previous === null);
  const nextIsDisabled = computed(() => props.next === null);
  function handleClick(event) {
    event.preventDefault();

    const href = event.target?.href;
    if (!href || props.loading) {
      return;
    }

    emit('paginate', href)
  }
</script>

<template>
  <div>{{ currentPage }} - {{ totalPages }}</div>
  <nav class="pagination" role="navigation" aria-label="pagination">
    <a @click="handleClick" :href="previous" class="pagination-previous button" :class="{ 'is-disabled': previousIsDisabled, 'is-loading': loading }">Anterior</a>
    <a @click="handleClick" :href="next" class="pagination-next button" :class="{ 'is-disabled': nextIsDisabled, 'is-loading': loading }">Próxima</a>
  </nav>
</template>
