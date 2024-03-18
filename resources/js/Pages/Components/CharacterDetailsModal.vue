<template>
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
                <i v-else-if="selectedCharacter.status === 'Dead'" class="fas fa-circle status-icon" style="color: rgb(224, 50, 50);"></i> 
                <i v-else class="fas fa-circle status-icon" style="color: rgb(169, 169, 169);"></i>
                <span v-if="selectedCharacter.status === 'Alive'" class="modal-value"> Vivo</span>
                <span v-else-if="selectedCharacter.status === 'Dead'" class="modal-value"> Morto</span>
                <span v-else class="modal-value"> Desconhecido</span>
            </p>
            <p class="modal-text">
                Espécie:
                <i v-if="selectedCharacter.species === 'Human'" class="fas fa-user"></i>
                <i v-else-if="selectedCharacter.species === 'Alien'" class="fas fa-space-shuttle"></i>
                <i v-else-if="selectedCharacter.species === 'Parasite'" class="fas fa-bug"></i>
                <span v-if="selectedCharacter.species === 'Human'" class="modal-value"> Humano</span>
                <span v-else-if="selectedCharacter.species === 'Alien'" class="modal-value"> Alienígena</span>
                <span v-else-if="selectedCharacter.species === 'Parasite'" class="modal-value"> Parasita</span>
            </p>
            <p class="modal-text">Total de episódios: <span class="modal-value">{{ selectedCharacter.episode.length }}</span></p>
            <p class="modal-text">Localização: <span class="modal-value">{{ selectedCharacter.location.name }}</span></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        selectedCharacter: Object
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        }
    }
};
</script>

<style scoped>
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

.modal-content {
    font-family: Arial, sans-serif;
    background-color: rgb(39, 43, 51);
    display: flex;
    align-items: center;
    width: 25%;
    padding: 40px;
}

.modal-text {
    font-family: Arial, sans-serif;
    font-size: 16px;
    margin-bottom: 5px;
}

.modal-value {
    font-weight: bold;
    margin-left: 4px;
}

.img-modal{
    border-radius: 100px;
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

.modal-content {
        width: 25%;
    }

.close:hover,
.close:focus {
    color: rgb(12, 87, 9);
    text-decoration: none;
}

@media only screen and (max-width: 1100px) {
    .modal-content {
        width: 100%;
    }

    .modal-text {
        white-space: nowrap;
    }
}
</style>  