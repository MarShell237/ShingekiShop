<template>
  <hr>
  <div class="single-pannier">
  <div class="primary-information">
      <img :src="panier.product.image" class="image" alt="">
      <div>
          <p style="width: 100%;font-size:30px;font-weight:bold">{{panier.product.name}}</p>
          <p>{{ panier.product.description}}</p>
      </div>
  </div>
  <div class="price-information">
    <p style="color: gold;font-size: 50px;font-weight:bold;text-align:center">
      {{formatteNombre(panier.product.price)}} Fcfa
    </p>
    <label for="quantite" style="font-size:20px;text-decoration:underline;">Quantites:</label>
    <div class="input-container">
      <input type="number" 
            :id="'quantite'+panier.id" 
            :class="{'is-invalidate':errorMsg}" 
            name="quantite" 
            placeholder="entrer la quantite de produit" 
            v-model="panierQuantite">
      <small class="invalidate" v-if="errorMsg">{{ errorMsg }}</small>
    </div>
    <label for="ville_id"  class="label" style="font-size:20px;text-decoration:underline;">
      Adresse de livraison:
    </label>
    <div class="input-container">
      <select name="ville_id" id="ville_id" v-model="panierVille">
        <option v-for="(ville, key) in villes" :value=key+1>{{ ville.name }}</option>
      </select>
  
    </div>

    <div style="display: flex;justify-content:space-between">
      <button @click="update(panier.id)" class="buttons update">
        mettre a jour le panier
      </button>
      <button @click="destroy(panier.id)" class="buttons delete">
          Supprimer 
      </button>
    </div>
  </div>
</div> 
</template>

<script setup>
import axios from 'axios';
import helpers from '../composables';
import { usePanierStore } from '../store/store';
import { ref } from 'vue';
import { useToast } from 'vue-toastification';

  const { formatteNombre } = helpers();
  const props = defineProps(['panier','villes'])
  const panierStore = usePanierStore();
  const toast = useToast();

  let panierQuantite = ref(props.panier.quantite);
  let panierVille = ref(props.panier.ville.id);
  let errorMsg = ref("");
  async function update(id){
    await axios.put(`panier/update/${id}`,{
      quantite:panierQuantite.value,
      ville_id:panierVille.value
    })
    .then(async (response)=> {
      // console.log(response);
      await panierStore.getPanier();
      toast.success("panier mis a jour avec success", {
        timeout: 5000
      });
    })
    .catch(err => {
      // console.log(err);
      errorMsg.value=err.response.data.message});
  }
  
  async function destroy(id){
    if(confirm('voulez vous vraiment suprimer ce produit du panier ?')){
      await axios.delete(`/panier/destroy/${id}`)
      .then(async () =>{await panierStore.getPanier();
        toast.success("panier supprimer avec succes", {
        timeout: 5000
      });
      window.location.href = '/panier'
      })
      .catch(()=>toast.error('une erreur s\'est produite'));
    }
  }
</script>

<style scoped>
  @import url('./../../css/partials/input.css');
  @import url('./../../css/partials/select.css');

  .single-pannier{
    background-color: rgb(255, 255, 255,0.20); 
    padding:25px; 
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:space-around; 
    box-shadow: 5px 5px 4px black;
  }

  .image{
    width: 100%;
  }

  .primary-information{
    display:flex;
    gap:10px;
    width:50%;
  }

  .price-information{
    width: 30%;
  }

  .buttons{
    border-radius:10px;
    color:white;
    font-size:20px;
    border-width:0;
    cursor: pointer;  
    border: 1px outset black;
  }

  .update{
    background-color:rgb(20, 147, 220);
    padding:8px;
  }

  .delete{
    background-color:crimson;
    padding:12px;
  }

  @media screen and (max-width:768px) {
    .single-pannier{
      flex-direction: column;

    }

    .primary-information{
      flex-direction: column;
      width: 90%;
    }

    .price-information{
      width: 90%;
    }

    .buttons{
      font-size:12px;
    }
  }

  button:active{
    border: .2px inset grey !important;
  }
</style>