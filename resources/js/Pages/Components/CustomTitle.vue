<template>
    <h2 class="custom-title text-white fw-bold text-center">
        <slot></slot>
    </h2>
</template>

<script setup>
</script>

<style scoped>

.custom-title {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Altere a fonte para algo mais moderno */
    font-size: 2.rem; /* Ajuste o tamanho da fonte conforme desejado */
    color: #fff; /* Defina a cor do texto */
    text-shadow: 2px 2px 4px rgba(6, 252, 6, 0.5); /* Adicione uma sombra suave ao texto */
    animation: pulse 1s infinite alternate; /* Mantenha a animação pulse para um efeito sutil */
}

@keyframes pulse {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.05);
    }
}

@media only screen and (max-width: 1100px) {
    .custom-title {
        font-size: 2rem !important;
    }
}
</style>