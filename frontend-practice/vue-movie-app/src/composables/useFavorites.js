import { ref, watch } from 'vue'

export function useFavorites() {
    const favorites = ref(
        JSON.parse(localStorage.getItem('favorites')) || []
    )
    // Funciones para gestionar favoritos
    // Función para agregar o eliminar un Pokémon de favoritos
    function toggleFavorite(pokemon) {
        const exists = favorites.value.find(p => p.name === pokemon.name)

        if (exists) {
            favorites.value = favorites.value.filter(p => p.name !== pokemon.name)
        } else {
            favorites.value.push(pokemon)
        }
    }
    // Función para verificar si un Pokémon está en favoritos
    function isFavorite(name) {
        return favorites.value.some(p => p.name === name)
    }
    // Función para limpiar todos los favoritos
    function clearFavorites() {
        favorites.value = []
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
        isFavorite,
        clearFavorites
    }
}