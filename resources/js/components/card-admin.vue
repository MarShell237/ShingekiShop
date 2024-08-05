<template>
    <div class="cards-accueil">
        <div class="card">
            <div class="card-top">
                    <img :src="img" alt="">
            </div>

            <div class="card-bottom">
                <p class="card-description" @click="showProduct">{{props.product.name}}</p>
                <div class="note">
                    <div class="stars">
                        <div class="star" :class="{'active':verifyIfIsActive(props.product.note)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.product.note-1)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.product.note-2)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.product.note-3)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.product.note-4)}"></div>
                    </div>
                    <p>{{props.product.nb_vote}}</p>
                </div>
                <p>{{formatteNombre(props.product.price)}} fcfa</p>
                <div style="display: flex;justify-content:flex-end;gap:10px">
                  <button
                    @click="update(product.id)"
                    style="background-color:rgb(20, 147, 220);padding:8px;border-radius:10px;color:white;font-size:20px;border-width:0;cursor: pointer;  border: 1px outset grey;">
                    mettre a jour
                  </button>
                  <button
                    @click="destroy(product.id)"
                    style="background-color:crimson;padding:8px;border-radius:10px;color:white;font-size:20px;border-width:0;cursor: pointer;  border: 1px outset grey;">
                      Supprimer 
                  </button>
                </div>
            </div>
        </div>
    </div>    
</template>


<script setup>
  import axios from 'axios';
  import { onMounted, ref } from 'vue';
import helpers from '../composables';
import { usePanierStore } from '../store/store';

  const { formatteNombre } = helpers();
  const props = defineProps(['product'])
  const img =props.product.image
  const myHeart = ref(false);
  let heartInput = ref(null);
  const panierStore = usePanierStore();

  function verifyIfIsActive(isOn){
    return isOn > 0;
  }

//requettes http
async function update(id){
    await axios.get(`product/${id}/edit`)
    .then(()=>window.location.href = `product/${id}/edit`)
    .catch(err => {
      // console.log(err);
      });    
  }
  
  async function destroy(id){
    if(confirm('voulez vous vraiment suprimer ce produit ?')){
      await axios.delete(`product/${id}`)
      .then(()=>window.location.href = 'product')
      .catch(err => console.log(err)
      );
    }
  }
</script>

<style scoped>
  .card{
    width: 300px;
    height: 400px;
    background-color: rgb(255, 255, 255,0.12);
    border-radius: 15px;
    box-shadow: 5px 5px 4px black;
  }

  .card .card-top{
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background-color: rgb(255, 255, 255,0.20);
    border-radius: 15px 15px 0 0;
    margin: 0;
    padding: 0;
  }

  .card .card-top img{
    width: 200px;
    height: 200px;
  }

  .card .card-bottom{
    position: relative;
    padding: 10px;
  }

  .card .card-description{
    font-family: sans-serif;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-clamp: 1;
    -webkit-line-clamp: 1;
    overflow: hidden;
  }

  .card .card-bottom > p{
    font-size:large;
    padding: 0;
    margin: 0;
  }

  .card .card-bottom > p:nth-of-type(2){
    text-align: center;
    font-size: xx-large;
  }

  .note{
    display: flex;
    align-items: center;
    padding: 0;
    margin: 0;
  }

  .note p{
    color: #6B5100;
    padding-left: 20px;
    font-size:x-large;
}

  .stars{
    display: flex;
  }

  .star{
    width: 30px;
    height: 30px;
    background-color: grey;
    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    transition: 200ms;
  }

  .active{
    background-color: gold;
  }

button:active{
    border: .2px inset black !important;
  }
</style>