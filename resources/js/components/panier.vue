<template>
  <hr>
  <div class="single-pannier" style="background-color: rgb(255, 255, 255,0.20); padding:25px; border-radius:10px;display:flex;align-items:center;justify-content:space-around;" >
  <div style="display:flex;gap:10px;width:50%">
      <img :src="panier.product.image" style="width:100%;" alt="">
      <div>
          <p style="width: 100%;font-size:30px;font-weight:bold">{{panier.product.name}}</p>
          <p>{{ panier.product.description}}</p>
      </div>
  </div>
  <div style="width: 30%;">
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
      <button
      type="submit"
        @click="update(panier.id)"
        style="background-color:rgb(20, 147, 220);padding:8px;border-radius:10px;color:white;font-size:20px;border-width:0;cursor: pointer;  border: 1px outset black;">
        mettre a jour le panier
      </button>
      <button
        @click="destroy(panier.id)"
        style="background-color:crimson;padding:12px;border-radius:10px;color:white;font-size:20px;border-width:0;cursor: pointer;  border: 1px outset black;">
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
      });
    }
  }
</script>

<style scoped>
  @import url('./../../css/partials/input.css');
  @import url('./../../css/partials/select.css');

  button:active{
    border: .2px inset grey !important;
  }
</style>