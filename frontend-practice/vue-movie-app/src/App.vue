<script setup>
import SearchBar from './components/SearchBar.vue'
import PokemonCard from './components/PokemonCard.vue'
import { usePokemon } from './composables/usePokemon.js'

const { pokemon, loading, error, fetchPokemon } = usePokemon()

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
  <PokemonCard v-if="pokemon" :pokemon="pokemon" />
</template>