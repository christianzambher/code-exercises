<script setup>
import { ref } from 'vue'

const emit = defineEmits(['search'])

const input = ref("")

function handleSearch() {
  if (!input.value.trim()) return
  emit('search', input.value)
}
</script>

<template>
  <div>
    <input
      v-model="input"
      @keyup.enter="handleSearch"
      placeholder="Buscar Pokémon..."
    />

    <button @click="handleSearch">Buscar</button>
  </div>
</template>