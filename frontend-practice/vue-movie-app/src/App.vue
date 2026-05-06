<script setup>
import SearchBar from './components/SearchBar.vue'
import PokemonCard from './components/PokemonCard.vue'
import { usePokemon } from './composables/usePokemon.js'
import { useFavorites } from './composables/useFavorites.js'

const { pokemon, loading, error, fetchPokemon } = usePokemon()
const { favorites, toggleFavorite, isFavorite } = useFavorites()
</script>

<template>
  <h1>Vue Pokemon Finder</h1>

  <!-- 🔍 Search -->
  <SearchBar @search="fetchPokemon" />

  <!-- ⏳ Loading -->
  <p v-if="loading">Cargando...</p>

  <!-- ❌ Error -->
  <p v-if="error">{{ error }}</p>

  <!-- 🃏 Pokémon Card -->
  <PokemonCard v-if="pokemon" :pokemon="pokemon" :isFavorite="isFavorite" :toggleFavorite="toggleFavorite" />
</template>