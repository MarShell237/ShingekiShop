<template>
  <h1 style="font-size: 90px;color:gold;margin-bottom:0;margin-top: 100px">Pannier</h1>
  <panier v-if="panierStore.paniersList.length > 0" v-for="panier in panierStore.paniersList" :panier="panier" :villes="panierStore.villes"></panier>
  <p v-else style="font-size: 70px;text-align:center;">Votre panier est vide</p>

  <hr>
  <h2 style="font-size: 50px">Sommaire</h2>
      <div class="col" style="font-size:30px">Nombre de produit: <span style="color: gold">{{panierStore.quantiteTotal}}</span> produit(s) dans le panier</div>                    
      <div style="font-size: 30px;padding-top:10px;text-decoration:underline;">Prix Total: </div>
      <div class="col text-right" style="color: gold;font-size:80px;"> {{formatteNombre(panierStore.prixTotal)}} FCFA </div>                  
      <a href="/facture">
        <button class="btn" style="background-color:#32A2E1;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px 0 0;border: 1px outset black;">
          Commander
        </button>
      </a>
      <a href="/panier/destroyAll">
        <button style="background-color:crimson;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;  border: 1px outset black;">
          Supprimer le panier
        </button>
      </a>
</template>

<script setup>
  import { onMounted,ref } from 'vue';
  import panier from '../../components/panier.vue';
import { usePanierStore } from '../../store/store';
  import helpers from '../../composables';

  const panierStore = usePanierStore();  

  const { formatteNombre } = helpers();

  function update(id){
    console.log(panierQuantite);
    console.log(panierVille);

    axios.put(`panier/update/${id}`,{
      quantite:panierQuantite,
      ville:panierVille
    })
    .then(response=> console.log(response))
    .catch(err => console.log(err));
  }
  
  async function destroy(id){
    await axios.delete(`/panier/destroy/${id}`)
    .then(async () =>await panierStore.getPanier());
  }

  onMounted(async ()=> await panierStore.getPanier())
</script>

<style scoped>
  button:active{
    border: .2px inset grey !important;
  }
</style>