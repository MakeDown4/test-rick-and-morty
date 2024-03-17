<template>
    <h2 class="custom-title text-white fw-bold text-center">
      <slot></slot>
    </h2>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  .custom-title {
  font-family: 'Montserrat', sans-serif;
  font-size: 3rem;
  text-shadow: 10px 10px 10px rgba(6, 252, 6, 0.349);
  animation: pulse 1s infinite alternate;
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