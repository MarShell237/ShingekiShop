<template>
  <!-- <h1 style="font-size: 90px;color:gold;margin-bottom:0;margin-top: 100px">Pannier</h1> -->
  <!-- <panier v-if="panierStore.paniersList.length > 0" v-for="panier in panierStore.paniersList" :panier="panier" :villes="panierStore.villes"></panier> -->
  <!-- <p v-else style="font-size: 70px;text-align:center;">Votre panier est vide</p> -->

  <hr>
  <h2 style="font-size: 50px">Sommaire</h2>
      <div class="col" style="font-size:30px">Nombre de produit: <span style="color: gold">{{panierStore.quantiteTotal}}</span> produit(s) dans le panier</div>                    
      <div style="font-size: 30px;padding-top:10px;text-decoration:underline;">Prix Total: </div>
      <div class="total-price"> {{formatteNombre(panierStore.prixTotal)}} FCFA </div>                  
      <a href="/facture">
        <button class="btn" style="background-color:#32A2E1;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px 0 0;border: 1px outset black;">
          Commander
        </button>
      </a>
        <button 
        @click="destroyAll"
        style="background-color:crimson;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;  border: 1px outset black;">
          Supprimer le panier
        </button>
</template>

<script setup>
  import { onMounted,ref } from 'vue';
  import panier from './panier.vue'
  import { useToast } from 'vue-toastification';
  import { usePanierStore } from '../store/store';
  import helpers from '../composables';

  const panierStore = usePanierStore();  

  const { formatteNombre } = helpers();

  const toast = useToast();

  
  async function destroyAll(){
    if(confirm('voulez vous supprimer tout le contenu du panier ?')){
      await axios.delete(`/panier/destroyAll`)
      .then(async () =>{await panierStore.getPanier();
        toast.success("panier completement supprimer avec success", {
        timeout: 5000
      });
      });
    }
  }

  onMounted(async ()=> await panierStore.getPanier())
</script>

<style scoped>
  .total-price{
    color: gold;
    font-size:80px;
  }

  @media screen and (max-width:768px) {
    .total-price{
      font-size: 45px;
    }

    button{
      font-size: 15px !important;
    }
  }

  button:active{
    border: .2px inset grey !important;
  }
</style>