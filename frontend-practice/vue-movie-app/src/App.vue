<script setup>
import { ref } from 'vue'

const query = ref("")
const pokemon = ref(null)
const loading = ref(false)
const error = ref(null)

async function searchPokemon() {
  if (!query.value.trim()) return

  try {
    loading.value = true
    error.value = null
    pokemon.value = null

    const res = await fetch(
      `https://pokeapi.co/api/v2/pokemon/${query.value.toLowerCase()}`
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

  <!-- 🔍 Input -->
  <input
    v-model="query"
    @keyup.enter="searchPokemon"
    placeholder="Buscar Pokémon..."
  />

  <button @click="searchPokemon">Buscar</button>

  <!-- ⏳ Loading -->
  <p v-if="loading">Cargando...</p>

  <!-- ❌ Error -->
  <p v-if="error">{{ error }}</p>

  <!-- 🎴 Card -->
  <div v-if="pokemon" class="card">
    <h2>{{ pokemon.name.toUpperCase() }}</h2>

    <img :src="pokemon.image" />
    <img :src="pokemon.shiny" />

    <p>Tipo: {{ pokemon.types.join(', ') }}</p>
  </div>
</template>