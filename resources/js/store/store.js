import { defineStore } from 'pinia'
import { ref } from 'vue';

export const usePanierStore = defineStore('panier',() => {
  let paniersList = ref([]);
  let villes = ref([]);
  let quantiteTotal = ref(0);
  let prixTotal = ref(0);

  async function getPanier(){
    let response = await axios.get('/panier/tous-les-paniers');
    paniersList.value = response.data.paniersList; 
    villes.value = response.data.villes; 
    quantiteTotal.value = response.data.quantiteTotal;
    prixTotal.value = response.data.prixTotal;
    
  }

  // console.log(paniers.value);

  return {
    paniersList,
    villes,
    prixTotal,
    quantiteTotal,
    getPanier,
  }
})