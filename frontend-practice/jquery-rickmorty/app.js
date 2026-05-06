let currentPage = 1;
let currentQuery = "";
let totalPages = 1;

$(document).ready(function () {
    $("#searchBtn").on("click", handleSearch);
    $("#prevBtn").on("click", () => changePage(-1));
    $("#nextBtn").on("click", () => changePage(1));

    loadCharacters();
});

// Funciones
// Maneja la búsqueda de personajes
function handleSearch() {
    currentQuery = $("#searchInput").val().trim();
    currentPage = 1;
    loadCharacters();
}
// Cambia la página actual
function changePage(step) {
    currentPage += step;
    if (currentPage < 1) currentPage = 1;
    loadCharacters();
}
// Carga los personajes desde la API
function loadCharacters() {
    setLoading(true);
    $("#status").text("Cargando...");
    $("#characters").empty();

    let url = `https://rickandmortyapi.com/api/character?page=${currentPage}`;

    if (!currentQuery && currentPage < 1) return;

    if (currentQuery) {
        url += `&name=${currentQuery}`;
    }

    $("#status").text("");

    $.ajax({
        url,
        method: "GET",
        success: function (data) {
            totalPages = data.info.pages;
            renderCharacters(data.results);
            updatePagination();
            $("#status").text("");
        },
        error: function () {
            $("#status").text("No se encontraron resultados");
            $("#characters").empty();
        },
        complete: function () {
            setLoading(false);
        }
    });
}
// Renderiza los personajes en la página
function renderCharacters(list) {
    list.forEach(character => {
        const card = `
      <div class="col-md-3">
        <div class="card h-100 text-center">
          <img src="${character.image}" class="card-img-top" />
          <div class="card-body">
            <h6 class="card-title">${character.name}</h6>
          </div>
        </div>
      </div>
    `;

        $("#characters").append(card);
    });
}
// Muestra u oculta el loader
function setLoading(isLoading) {
    if (isLoading) {
        $("#loader").show();
    } else {
        $("#loader").hide();
    }
}
// Actualiza el estado de los botones de paginación
function updatePagination() {
    $("#prevBtn").prop("disabled", currentPage === 1);
    $("#nextBtn").prop("disabled", currentPage === totalPages);
}