const input = document.getElementById("pokemonInput");
const button = document.getElementById("searchBtn");

const statusDiv = document.getElementById("status");

const card = document.getElementById("pokemonCard");
const nameEl = document.getElementById("pokemonName");
const imgEl = document.getElementById("pokemonImg");
const imgShinyEl = document.getElementById("pokemonImgShiny");
const typesEl = document.getElementById("pokemonTypes");

// Evento principal
button.addEventListener("click", () => {
  const value = input.value.toLowerCase().trim();

  if (!value) {
    showStatus("Ingresa un nombre de Pokémon", "error");
    return;
  }

  fetchPokemon(value);
});

// Fetch a API
async function fetchPokemon(name) {
  try {
    showStatus("Cargando...", "loading");
    card.classList.add("hidden");

    let url = 'https://pokeapi.co/api/v2/pokemon/' + name;
    const response = await fetch(url);

    if (!response.ok) {
      throw new Error("No encontrado");
    }

    const data = await response.json();

    renderPokemon(data);
    showStatus("", "");

  } catch (error) {
    showStatus("Pokémon no encontrado", "error");
  }
}

// Render UI
function renderPokemon(data) {
    console.log(data);
    imgEl.src = null; // Limpia imagen anterior
    imgShinyEl.src = null; // Limpia imagen shiny anterior

    nameEl.textContent = data.name.toUpperCase();
    
    imgEl.src = data.sprites.other["official-artwork"]["front_default"];
    imgShinyEl.src = data.sprites.other["official-artwork"]["front_shiny"];

    const types = data.types.map(t => t.type.name).join(", ");
    typesEl.textContent = `Tipo: ${types}`;

    card.classList.remove("hidden");
}

// Status UI
function showStatus(message, type) {
  statusDiv.textContent = message;

  statusDiv.style.color =
    type === "error" ? "red" :
    type === "loading" ? "blue" :
    "black";
}