<template>
  <div>
    <BackgroundTop />
      <GreenLine />
        <PageContainer>
          <CustomTitle>Rick and Morty - Personagens</CustomTitle>
            <br><br>
            <SearchBar
              :searchQuery="searchQuery"
              :statusFilter="statusFilter"
              @updateSearchQuery="handleSearchQuery"
              @updateStatusFilter="handleStatusFilter"
            />
            <br>
            <div v-if="loading">Carregando...</div>
            <div v-else>
              <div class="info mb-3 text-white text-center">
                <p>Total de Personagens Encontrados: {{ filteredCharacters.length }}</p>
              </div>
              <div class="row">
                <CharacterCard
                  v-for="character in paginatedCharacters"
                  :key="character.id"
                  :character="character"
                  @showDetails="showModal"
                />
              </div><br><br>
              <div class="pagination justify-content-center">
                <button class="btn btn-secondary me-1" @click="previousPage" :disabled="currentPage === 1">Anterior</button>
                <span v-for="pageNumber in totalPageNumbers" :key="pageNumber" class="btn btn-success me-1" :class="{ 'active': pageNumber === currentPage }" @click="goToPage(pageNumber)">{{ pageNumber }}</span>
                <button class="btn btn-secondary" @click="nextPage" :disabled="currentPage === totalPages">Próxima</button>
              </div>
            </div>
        <CharacterDetailsModal :selectedCharacter="selectedCharacter" @closeModal="closeModal" />
    </PageContainer>
  </div>
</template>

<script>
import BackgroundTop from './Components/BackgroundTop.vue';
import GreenLine from './Components/GreenLine.vue';
import PageContainer from './Components/PageContainer.vue';
import CustomTitle from './Components/CustomTitle.vue';
import SearchBar from './Components/SearchBar.vue';
import CharacterDetailsModal from './Components/CharacterDetailsModal.vue';
import CharacterCard from './Components/CharacterCard.vue';

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
    components: {
      BackgroundTop,
      GreenLine,
      PageContainer,
      CustomTitle,
      SearchBar,
      CharacterDetailsModal,
      CharacterCard,
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
    handleSearchQuery(query) {
      this.searchQuery = query;
    },
    handleStatusFilter(filter) {
      this.statusFilter = filter;
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
    goToPage(pageNumber) {
      this.currentPage = pageNumber;
    },
    showModal(character) {
      this.selectedCharacter = character;
    },
    closeModal() {
      this.selectedCharacter = null;
    },
  }
};
</script>

<style scoped>

.info {
  margin-bottom: 10px;
}

@keyframes moveLine {
    0% {
      background-position: 0 0;
    }
    100% {
      background-position: 200% 0;
    }
}
</style>