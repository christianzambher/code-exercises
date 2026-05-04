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

const exploreBtn = document.getElementById("exploreBtn");
const listContainer = document.getElementById("listContainer");

let currentController = null;

//#region Eventos
button.addEventListener("click", handleSearch);

input.addEventListener("keypress", (e) => {
  if (e.key === "Enter") handleSearch();
});

clearHistoryBtn.addEventListener("click", clearHistory);
exploreBtn.addEventListener("click", loadPokemonList);
//#endregion

//#region Init
loadHistory();
//#endregion

//#region Handlers
function handleSearch() {
  const value = input.value.toLowerCase().trim();

  if (!value) {
    showStatus("Ingresa un nombre de Pokémon", "error");
    return;
  }

  getPokemon(value);
}
//#endregion

//#region Core
// Obtener Pokémon (cache + API)
async function getPokemon(name) {
  try {
    // Cancelar petición anterior si existe
    if (currentController) currentController.abort();

    currentController = new AbortController();

    setLoading(true);
    card.classList.add("hidden");

    const cached = getFromCache(name);

    if (cached) {
      renderPokemon(cached);
      showStatus("(cache)", "success");
      saveToHistory(name);
      return;
    }

    let url = `https://pokeapi.co/api/v2/pokemon/${name}`;
    const response = await fetch(url, { signal: currentController.signal });

    if (!response.ok) throw new Error();

    const data = await response.json();

    const mapped = mapPokemon(data);

    saveToCache(name, mapped);
    renderPokemon(mapped);
    saveToHistory(name);

    showStatus("", "");

  } catch (error) {
    console.error(error);
    if (error.name === "AbortError") return;
    showStatus("Pokémon no encontrado", "error");
  } finally {
    setLoading(false);
  }
}
//#endregion

//#region Cache(TTL)
function getFromCache(name) {
  const data = localStorage.getItem(`pokemon_${name}`);

  if (!data) return null;

  const parsed = JSON.parse(data);
  const isExpired = Date.now() - parsed.timestamp > CACHE_TTL;

  if (isExpired) {
    localStorage.removeItem(`pokemon_${name}`);
    return null;
  }

  return parsed.data;
}

function saveToCache(name, data) {
  try {
    const payload = {
      data,
      timestamp: Date.now()
    };

    localStorage.setItem(`pokemon_${name}`, JSON.stringify(payload));
  } catch (e) {
    if (e.name === "QuotaExceededError") {
      console.warn("Cache lleno, limpiando...");
      localStorage.clear();
    }
  }

}
//#endregion

//#region Historial
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
//#endregion

//#region Explorar
async function loadPokemonList() {
  try {
    setLoading(true);

    const response = await fetch(
      "https://pokeapi.co/api/v2/pokemon?limit=20"
    );

    if (!response.ok) throw new Error();

    const data = await response.json();

    renderList(data.results);

  } catch {
    showStatus("Error cargando lista", "error");
  } finally {
    setLoading(false);
  }
}

function renderList(list) {
  listContainer.innerHTML = "<h3>Explorar</h3>";

  list.forEach(pokemon => {
    const el = document.createElement("div");
    el.textContent = pokemon.name;
    el.classList.add("list-item");

    el.addEventListener("click", () => {
      input.value = pokemon.name;
      getPokemon(pokemon.name);
    });

    listContainer.appendChild(el);
  });
}
//#endregion

//#region UI
function renderPokemon(data) {
  imgEl.src = ""; // Limpia imagen anterior
  imgShinyEl.src = ""; // Limpia imagen shiny anterior

  nameEl.textContent = data.name.toUpperCase();

  imgEl.src = data.image;
  imgShinyEl.src = data.shiny;

  typesEl.textContent = `Tipo: ${data.types.join(", ")}`;

  card.classList.remove("hidden");
}

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

//#region Mapeo de datos
function mapPokemon(data) {
  return { // Solo extraemos lo necesario para nuestra app
    name: data.name,
    image: data["sprites"]["other"]["official-artwork"]["front_default"],
    shiny: data["sprites"]["other"]["official-artwork"]["front_shiny"],
    types: data.types.map(t => t.type.name)
  };
}
//#endregion