import { ref, watch } from 'vue'

export function useFavorites() {
  const favorites = ref(
    JSON.parse(localStorage.getItem('favorites')) || []
  )

  function toggleFavorite(pokemon) {
    const exists = favorites.value.find(p => p.name === pokemon.name)

    if (exists) {
      favorites.value = favorites.value.filter(p => p.name !== pokemon.name)
    } else {
      favorites.value.push(pokemon)
    }
  }

  function isFavorite(name) {
    return favorites.value.some(p => p.name === name)
  }

  // Persistencia automática
  watch(
    favorites,
    (val) => {
      localStorage.setItem('favorites', JSON.stringify(val))
    },
    { deep: true }
  )

  return {
    favorites,
    toggleFavorite,
    isFavorite
  }
}