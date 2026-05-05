<script setup>
import { ref } from 'vue'
import SearchBar from './components/SearchBar.vue'
import PokemonCard from './components/PokemonCard.vue'

const pokemon = ref(null)
const loading = ref(false)
const error = ref(null)

async function searchPokemon(name) {
  try {
    loading.value = true
    error.value = null
    pokemon.value = null

    const res = await fetch(
      `https://pokeapi.co/api/v2/pokemon/${name.toLowerCase()}`
    )

    if (!res.ok) throw new Error()

    const data = await res.json()

    // Normalizamos (como hiciste en JS)
    pokemon.value = {
      name: data.name,
      image: data.sprites.other["official-artwork"].front_default,
      shiny: data.sprites.other["official-artwork"].front_shiny,
      types: data.types.map(t => t.type.name)
    }

  } catch {
    error.value = "Pokémon no encontrado"
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <h1>Vue Pokemon Finder</h1>

  <!-- 🔍 Search -->
  <SearchBar @search="searchPokemon" />

  <!-- ⏳ Loading -->
  <p v-if="loading">Cargando...</p>

  <!-- ❌ Error -->
  <p v-if="error">{{ error }}</p>

  <!-- 🃏 Pokémon Card -->
  <PokemonCard v-if="pokemon" :pokemon="pokemon" />
</template>