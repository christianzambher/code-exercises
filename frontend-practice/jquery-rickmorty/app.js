let currentPage = 1;
let currentQuery = "";

$(document).ready(function () {
  $("#searchBtn").on("click", handleSearch);
  $("#prevBtn").on("click", () => changePage(-1));
  $("#nextBtn").on("click", () => changePage(1));

  loadCharacters();
});

function handleSearch() {
  currentQuery = $("#searchInput").val().trim();
  currentPage = 1;
  loadCharacters();
}

function changePage(step) {
  currentPage += step;
  if (currentPage < 1) currentPage = 1;
  loadCharacters();
}

function loadCharacters() {
  $("#status").text("Cargando...");
  $("#characters").empty();

  let url = `https://rickandmortyapi.com/api/character?page=${currentPage}`;

  if (currentQuery) {
    url += `&name=${currentQuery}`;
  }

  $.ajax({
    url,
    method: "GET",
    success: function (data) {
      renderCharacters(data.results);
      $("#status").text("");
    },
    error: function () {
      $("#status").text("No se encontraron resultados");
    }
  });
}

function renderCharacters(list) {
  list.forEach(character => {
    const card = `
      <div class="card">
        <img src="${character.image}" />
        <p>${character.name}</p>
      </div>
    `;

    $("#characters").append(card);
  });
}