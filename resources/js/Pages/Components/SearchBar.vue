<template>
    <div class="search-bar row md-2">
        <div class="col-md-3 position-relative as">
            <span class="search-icon fas fa-search"></span>
            <input type="text" class="form-control search-input" :value="searchQuery" @input="updateSearchQuery" placeholder="Pesquisar por nome" />
        </div>
        <div class="col-md-2">
            <div class="input-group">
                <select class="form-select text-center search-input-select text-white" :value="statusFilter" @change="updateStatusFilter">
                    <option value="">Todos</option>
                    <option value="Alive">Vivo</option>
                    <option value="Dead">Morto</option>
                    <option value="unknown">Desconhecido</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        searchQuery: String,
        statusFilter: String
    },
    methods: {
        updateSearchQuery(event) {
            this.$emit('updateSearchQuery', event.target.value);
        },
        updateStatusFilter(event) {
            this.$emit('updateStatusFilter', event.target.value);
        }
    }
};
</script>

<style scoped>
.search-bar {
    display: flex;
    justify-content: center;
}

.search-input-select {
    border-radius: 30px;
    border: solid 1px rgb(39, 43, 51);
    background-color: rgb(63, 66, 71);
    cursor: pointer;
}

.search-input-select option:hover {
    background-color: #067722 !important;
    color: #000;
}

.search-icon {
    position: absolute;
    top: 50%;
    right: 7%;
    transform: translateY(-50%);
    color: #6c757d;
}

.search-input {
    border-radius: 30px;
    width: 100%;
}

.search-icon:hover {
    color: #343a40;
}

@media only screen and (max-width: 1100px) {
    .search-icon {
        display: none !important;
    }
}
</style>