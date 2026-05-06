<script setup>
import PokemonCard from '../components/PokemonCard.vue'
import { useFavorites } from '../composables/useFavorites.js'

const { favorites, toggleFavorite, isFavorite, clearFavorites } = useFavorites()
</script>

<template>
    <h1>Pokemones Favoritos</h1>

    <p v-if="favorites.length === 0">No tienes favoritos aún</p>

    <button @click="clearFavorites">Limpiar favoritos</button>

    <div class="grid">
        <div v-for="pokemon in favorites" :key="pokemon.name">
            <PokemonCard :pokemon="pokemon" :toggleFavorite="toggleFavorite" :isFavorite="isFavorite" />
        </div>
    </div>
</template>