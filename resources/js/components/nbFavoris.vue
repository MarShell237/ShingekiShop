<template>
  <span>
    {{ panierStore.quantiteTotal }}
  </span>
</template>

<script setup>
import { onMounted } from 'vue';
import { usePanierStore } from '../store/store';
const panierStore = usePanierStore();

  onMounted(async ()=> await panierStore.getPanier())

</script>

<style scoped>
  span{
    position: absolute;
    display: block;
    text-align: center;
    width: 18px;
    height: 18px;
    top: -10;
    right: 0;
    background-color: red;
    font-size: small;
    border-radius: 100%;
  }
</style>