<template>
    <div class="green-line"></div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
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
  </style>  