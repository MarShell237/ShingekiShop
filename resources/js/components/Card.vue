<template>
    <div class="cards-accueil">
        <div class="card">
            <div class="card-top">
                    <img :src="img" alt="" @click="showProduct">
                <label :for="'checkbox'+props.product.id"><i class="fa fa-heart" :class="{'i-am-pulse' : myHeart}" :id="'label'+props.product.id" @click="pulseHeart"></i></label>
                <input type="checkbox" name="" :id="'checkbox'+props.product.id" ref="heartInput" @change="pulseHeart">
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
                <button @click="ajouterAuPanier">
                    <span>Ajouter au panier</span>
                    <i class="fa fa-cart-shopping"></i>
                </button>
            </div>
        </div>
    </div>    
</template>


<script setup>
  import axios from 'axios';
  import { onMounted, ref } from 'vue';
import helpers from '../composables';
import { usePanierStore } from '../store/store';
import { useToast } from 'vue-toastification';

  const { formatteNombre } = helpers();
  const props = defineProps(['product','slug'])
  const img =props.product.image
  const myHeart = ref(false);
  let heartInput = ref(null);
  const panierStore = usePanierStore();
  const toast = useToast();

//events lisners
  function pulseHeart(){
    myHeart.value = heartInput.value.checked;
  }

  function verifyIfIsActive(isOn){
    return isOn > 0;
  }

//requettes http
  function showProduct(){
    axios.get(`/client/product/${props.slug}/${props.product.id}`)
    .then(()=>{window.location.href=`/client/product/${props.slug}/${props.product.id}`})
    // .catch(()=>{window.location.href='/inscription'})

  }

  function ajouterAuPanier(){
    axios.post(`/panier/store/${props.product.id}`)
    .then(async () =>{
      toast.success("produit ajouter au panier avec succes", {
        timeout: 3000
      });
      await panierStore.getPanier();
    })
    .catch(()=>{
      toast.warning("vous devez etre connecter pour ajouter un produit au pannier", {
          timeout: 5000
        });
    // window.location.href='/inscription';
    })
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
    cursor: pointer;
  }

  .card .card-top .fa-heart{
    position: absolute;
    top: 20px;
    right: 20px;
    scale: 2;
    transition: 1s;
    animation-duration: 1.5s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-out;
    cursor: pointer;
  }

  .card .card-top input{
      display: none;
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

  .card .card-description:hover{
    text-decoration: underline;
    cursor: pointer;
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

  .card .card-bottom button{
    position: absolute;
    background-color: grey;
    color: white;
    border-width: 0;
    padding: 10px;
    border-radius: 5px;
    right: 10px;
    background-color: #142C4C;
    border: 1px outset grey;
    transition: 200ms;
    cursor: pointer;
  }

  .card .card-bottom button:hover, .card .card-bottom button:hover .fa-cart-shopping{
    color: gold;
  }

  .card .card-bottom button:active{
    border: .2px solid grey;
  }

  .i-am-pulse{
    animation-name: pulse;
  }

  @keyframes pulse {
    0%{
      scale: 2;
      color: pink;
    }
    
    15%{
      color: greenyellow;
    }
    
    30%{
      color: rgb(207, 3, 71);
    }
    
    60%{
      scale: 3;
      color: rgb(252, 43, 43);
    }
    
    80%{
      color: green;
    }

    100%{
      scale: 2;
      color: red;
      text-shadow: .5px 0 1px black;
    }
  }    
</style>