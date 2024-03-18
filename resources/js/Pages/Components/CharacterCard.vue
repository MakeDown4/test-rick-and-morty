<template>
    <div class="col-md-2">
        <div class="character-card card mb-3 highlight-on-hover" @click="showDetails">
            <img class="char-img" :src="character.image" :alt="character.name" />
            <div class="card-body">
                <h5 class="card-title text-center text-white">{{ character.name }}</h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        character: Object
    },
    methods: {
        showDetails() {
            this.$emit('showDetails', this.character);
        }
    }
};
</script>

<style scoped>
.character-card {
    border: 1px solid rgb(39, 43, 51);
    border-top-right-radius: 100px;
    border-top-left-radius: 100px;
}

.highlight-on-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}
.highlight-on-hover:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.char-img{
    border: 1px solid;
    border-radius: 10px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.card-body {
    background-color: rgb(60, 62, 68);
}

.card-title {
    white-space: nowrap;
}

@media only screen and (max-width: 1100px) {
    .card-title {
        white-space: unset !important;
    }
}
</style>
