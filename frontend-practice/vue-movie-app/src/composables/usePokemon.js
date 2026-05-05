import { ref } from 'vue'

export function usePokemon() {
  const pokemon = ref(null)
  const loading = ref(false)
  const error = ref(null)

  async function fetchPokemon(name) {
    try {
      loading.value = true
      error.value = null
      pokemon.value = null

      const res = await fetch(
        `https://pokeapi.co/api/v2/pokemon/${name.toLowerCase()}`
      )

      if (!res.ok) throw new Error()

      const data = await res.json()

      // Normalización (clave)
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

  return {
    pokemon,
    loading,
    error,
    fetchPokemon
  }
}