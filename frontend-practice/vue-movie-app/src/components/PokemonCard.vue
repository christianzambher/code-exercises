<script setup>
defineProps({
  pokemon: Object,
  isFavorite: Function,
  toggleFavorite: Function
})
</script>

<template>
  <div class="card">
    <h2>
      {{ pokemon.name.toUpperCase() }}
      <span @click="toggleFavorite(pokemon)" :class="{ favorito: isFavorite(pokemon.name) }">
        {{ isFavorite(pokemon.name) ? '⭐' : '☆' }}
      </span>
    </h2>

    <img :src="pokemon.image" />
    <img :src="pokemon.shiny" />

    <p>Tipo: {{ pokemon.types.join(', ') }}</p>
  </div>
</template>