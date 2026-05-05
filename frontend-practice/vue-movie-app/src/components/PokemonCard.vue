<script setup>
defineProps({
  pokemon: Object
})
</script>

<template>
  <div class="card">
    <h2>{{ pokemon.name.toUpperCase() }}</h2>

    <img :src="pokemon.image" />
    <img :src="pokemon.shiny" />

    <p>Tipo: {{ pokemon.types.join(', ') }}</p>
  </div>
</template>