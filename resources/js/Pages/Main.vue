<template>
  <div>
    <!-- div pro background da parte superior -->
    <div class="background-top"></div>

    <!-- efeito de linha verde entre eles -->
    <div class="green-line"></div>

    <!-- conteúdo da página -->
    <div class="page-container d-flex flex-column">
      <h2 class="text-center text-white fw-bold custom-title" style="font-family: 'Get Schwifty', cursive;">Rick and Morty Personagens</h2>

      <br><br>
      <div class="search-bar row md-2">
        <div class="col-md-3 position-relative as">
          <span class="search-icon fas fa-search"></span>
          <input type="text" class="form-control search-input" v-model="searchQuery" placeholder="Pesquisar por nome" @input="searchCharacters" />
        </div>
        <div class="col-md-2">
          <select class="form-select text-center search-input-select text-white" v-model="statusFilter" @change="filterCharacters">
            <option value="">Todos</option>
            <option value="Alive">Vivo</option>
            <option value="Dead">Morto</option>
            <option value="unknown">Desconhecido</option>
          </select>
        </div>
      </div>
      <div v-if="loading">Carregando...</div>
      <div v-else>
        <div class="info mb-3">
          <p>Total de personagens: {{ characters.length }}</p>
        </div>
        <div class="row">
          <div class="col-md-2" v-for="character in paginatedCharacters" :key="character.id">
            <div class="character-card  card mb-3 highlight-on-hover">
              <img class="char-img" :src="character.image" :alt="character.name" @click="showDetails(character)" />
              <div class="card-body">
                <h5 class="card-title text-center text-white">{{ character.name }}</h5>
              </div>
            </div>
          </div>
        </div><br><br>
        <div class="current-characters-info text-center text-white mt-3">
          <p>Total de Personagens Encontrados: {{ filteredCharacters.length }}</p>
        </div>
        <div class="pagination justify-content-center">
          <button class="btn btn-secondary me-1" @click="previousPage" :disabled="currentPage === 1">Anterior</button>
          <span v-for="pageNumber in totalPageNumbers" :key="pageNumber" class="btn btn-success me-1" :class="{ 'active': pageNumber === currentPage }" @click="goToPage(pageNumber)">{{ pageNumber }}</span>
          <button class="btn btn-secondary" @click="nextPage" :disabled="currentPage === totalPages">Próxima</button>
        </div>
      </div>
  
<!-- Modal -->
<div class="modal" v-if="selectedCharacter" @click.self="closeModal">
  <div class="modal-content text-white">
    <span class="close" @click="closeModal">&times;</span>
    <div>
      <img class="img-modal" :src="selectedCharacter.image" :alt="selectedCharacter.name" />
    </div>
    <br><br>
    <p class="modal-text">Nome: <span class="modal-value">{{ selectedCharacter.name }}</span></p>
    <p class="modal-text">Status: 
      <i v-if="selectedCharacter.status === 'Alive'" class="fas fa-circle status-icon" style="color: rgb(4, 175, 4);"></i>
      <i v-else class="fas fa-circle status-icon" style="color: rgb(224, 50, 50);"></i> 
      <span v-if="selectedCharacter.status === 'Alive'" class="modal-value"> Vivo</span>
      <span v-else class="modal-value"> Morto</span>
    </p>
    <p class="modal-text">
      Espécie:
      <i v-if="selectedCharacter.species === 'Human'" class="fas fa-user"></i>
      <i v-else-if="selectedCharacter.species === 'Alien'" class="fas fa-space-shuttle"></i>
      <i v-else-if="selectedCharacter.species === 'Parasite'" class="fas fa-bug"></i>
      <span v-if="selectedCharacter.species === 'Human'" class="modal-value"> Humano</span>
      <span v-else-if="selectedCharacter.species === 'Alien'" class="modal-value"> Alienígena</span>
      <span v-else-if="selectedCharacter.species === 'Parasite'" class="modal-value"> Parasita</span>
      <span v-else class="modal-value"> Desconhecida</span>
    </p>
    <p class="modal-text">Total de episódios: <span class="modal-value">{{ selectedCharacter.episode.length }}</span></p>
    <p class="modal-text">Localização: <span class="modal-value">{{ selectedCharacter.location.name }}</span></p>
  </div>
</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      characters: [],
      loading: true,
      currentPage: 1,
      charactersPerPage: 12,
      searchQuery: '',
      statusFilter: '',
      selectedCharacter: null
    };
  },
  mounted() {
    this.fetchCharacters();
  },
  computed: {
    totalPages() {
      return Math.ceil(this.filteredCharacters.length / this.charactersPerPage);
    },
    paginatedCharacters() {
      const start = (this.currentPage - 1) * this.charactersPerPage;
      const end = start + this.charactersPerPage;
      return this.filteredCharacters.slice(start, end);
    },
    filteredCharacters() {
      let filtered = this.characters;

      if (this.searchQuery) {
        filtered = filtered.filter(character => character.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
      }

      if (this.statusFilter) {
        filtered = filtered.filter(character => character.status === this.statusFilter);
      }

      return filtered;
    },
    totalPageNumbers() {
      return Array.from({ length: this.totalPages }, (_, index) => index + 1);
    }
  },
  methods: {
    async fetchCharacters() {
      try {
        const response = await fetch('https://rickandmortyapi.com/api/character');
        const data = await response.json();
        this.characters = data.results;
        this.loading = false;
      } catch (error) {
        console.error('Erro ao buscar personagens:', error);
        this.loading = false;
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    searchCharacters() {
      this.currentPage = 1;
    },
    filterCharacters() {
      this.currentPage = 1;
    },
    showDetails(character) {
      this.selectedCharacter = character;
    },
    closeModal() {
      this.selectedCharacter = null;
    },
    goToPage(pageNumber) {
      this.currentPage = pageNumber;
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Get+Schwifty&display=swap');
.background-top {
  width: 100%;
  height: 38vh;
  background-image: url('/img/ricky-and-morty-bg.jpg');
  background-size: cover;
  background-position: center top 45%;
}

.page-container {
  font-family: Arial, sans-serif;
  background-color: rgb(39, 43, 51);
  padding: 100px;
}

.character-card {
  border: 1px solid rgb(39, 43, 51);
  border-top-right-radius: 100px;
  border-top-left-radius: 100px;
}

.info {
  margin-bottom: 10px;
}

.card-body {
  background-color: rgb(60, 62, 68);
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
}

.highlight-on-hover {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}
.highlight-on-hover:hover {
  transform: scale(1.05);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.modal-content {
  font-family: Arial, sans-serif;
  background-color: rgb(39, 43, 51);
  display: flex;
  align-items: center;
  width: 25%;
  padding: 40px;
}

/* Media query para tablets */
@media only screen and (max-width: 1100px) {
  .modal-content {
    width: 100%;
  }

  .search-input {
    width: 85% !important;
  }

  .custom-title {
    font-size: 2rem !important;
  }

  .search-icon {
    display: none !important;
  }

  .as{
    display: contents;
  }
  
}

.close {
  color: #aaa;
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.modal-text {
  font-family: Arial, sans-serif;
  font-size: 16px;
  margin-bottom: 5px;
}

.modal-value {
  font-weight: bold;
  margin-left: 5px;
}

.search-bar {
  display: flex;
  justify-content: center;
}

.char-img{
  border: 1px solid;
  border-radius: 10px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.custom-title {
  font-size: 3rem;
  text-shadow: 1px 5px 10px rgba(6, 252, 6, 0.349);
  color: #ffc107;
  animation: pulse 7s infinite alternate;
}

@keyframes pulse {
  from {
    transform: scale(1);
  }
  to {
    transform: scale(1.05);
  }
}

.search-input {
  border-radius: 30px;
  width: 100%;
}

.search-input-select {
  border-radius: 30px;
  border: solid 1px rgb(39, 43, 51);
  background-color: rgb(63, 66, 71);
  cursor: pointer;
}

/* Estilizando as options quando hover */
.search-input-select option:hover {
  background-color: #067722 !important; /* Cor de fundo das options quando hover */
  color: #000; /* Cor do texto das options quando hover */
}

.search-icon {
  position: absolute;
  top: 50%;
  right: 7%;
  transform: translateY(-50%);
  color: #6c757d;
}

.img-modal{
  border:1px solid rgb(33, 151, 112);
  border-radius: 100px;
}

.search-icon:hover {
  color: #343a40;
}

.green-line {
  width: 100%;
  height: 4px;
  background-image: linear-gradient(to right, transparent, #0fda0f, transparent);
  background-size: 200% 100%;
  animation: moveLine 3s infinite linear;
}

@keyframes moveLine {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 200% 0;
  }
}

.close:hover,
.close:focus {
  color: rgb(190, 81, 81);
  text-decoration: none;
}
</style>