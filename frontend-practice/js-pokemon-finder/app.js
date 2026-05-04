const CACHE_TTL = 1000 * 60 * 5; // 5 minutos

const input = document.getElementById("pokemonInput");
const button = document.getElementById("searchBtn");
const clearHistoryBtn = document.getElementById("clearHistoryBtn");

const statusDiv = document.getElementById("status");
const loader = document.getElementById("loader");
const historyDiv = document.getElementById("history");

const card = document.getElementById("pokemonCard");
const nameEl = document.getElementById("pokemonName");
const imgEl = document.getElementById("pokemonImg");
const imgShinyEl = document.getElementById("pokemonImgShiny");
const typesEl = document.getElementById("pokemonTypes");

// Eventos
button.addEventListener("click", handleSearch);
input.addEventListener("keypress", (e) => {
  if (e.key === "Enter") handleSearch();
});
clearHistoryBtn.addEventListener("click", clearHistory);

// Inicializar historial
loadHistory();

// Handler principal
function handleSearch() {
  const value = input.value.toLowerCase().trim();

  if (!value) {
    showStatus("Ingresa un nombre de Pokémon", "error");
    return;
  }

  getPokemon(value);
}

// Obtener Pokémon (cache + API)
async function getPokemon(name) {
  try {
    setLoading(true);
    card.classList.add("hidden");

    const cached = getFromCache(name);

    if (cached) {
      renderPokemon(cached);
      showStatus("(cache)", "success");
      saveToHistory(name);
      return;
    }

    let url = 'https://pokeapi.co/api/v2/pokemon/' + name;
    const response = await fetch(url);

    if (!response.ok) throw new Error("No encontrado");

    const data = await response.json();

    saveToCache(name, data);
    renderPokemon(data);
    saveToHistory(name);

    showStatus("", "");

  } catch (error) {
    showStatus("Pokémon no encontrado", "error");
  } finally {
    setLoading(false);
  }
}

// Cache
function getFromCache(name) {
  const data = localStorage.getItem(`pokemon_${name}`);

  if (!data) return null;

  const parsed = JSON.parse(data);
  const isExpired = Date.now() - parsed.timestamp > CACHE_TTL;

  if (isExpired) {
    localStorage.removeItem(`pokemon_${name}`);
    return null;
  }

  return parsed;
}

function saveToCache(name, data) {
  const payload = {
    data,
    timestamp: Date.now()
  };

  localStorage.setItem(`pokemon_${name}`, JSON.stringify(payload));
}

// Historial
function saveToHistory(name) {
  let history = JSON.parse(localStorage.getItem("history")) || [];

  // Evitar duplicados
  history = history.filter(n => n !== name);
  history.unshift(name); // Agregar al inicio

  if (history.length > 5) history.pop();

  localStorage.setItem("history", JSON.stringify(history));
  renderHistory();
}

function clearHistory() {
  localStorage.removeItem("history");
  renderHistory();
}

function loadHistory() {
  renderHistory();
}

function renderHistory() {
  const history = JSON.parse(localStorage.getItem("history")) || [];

  historyDiv.innerHTML = "<h3>Historial</h3>";

  history.forEach(name => {
    const el = document.createElement("span");
    el.textContent = name;
    el.classList.add("history-item");

    el.addEventListener("click", () => {
      input.value = name;
      getPokemon(name);
    });

    historyDiv.appendChild(el);
  });
}

// UI
function renderPokemon(data) {
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
        type === "success" ? "green" :
          "black";
}

function setLoading(isLoading) {
  loader.classList.toggle("hidden", !isLoading);
}