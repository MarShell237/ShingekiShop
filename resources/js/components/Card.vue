<template>
    <div class="cards-accueil">
        <div class="card">
            <div class="card-top">
                    <img :src="img" alt="" @click="showProduct">
                <label :for="'checkbox'+props.valeur.id"><i class="fa fa-heart" :class="{'i-am-pulse' : myHeart}" :id="'label'+props.valeur.id" @click="pulseHeart"></i></label>
                <input type="checkbox" name="" :id="'checkbox'+props.valeur.id" ref="heartInput" @change="pulseHeart">
            </div>

            <div class="card-bottom">
                <p class="card-description">{{props.valeur.name}}</p>
                <div class="note">
                    <div class="stars">
                        <div class="star" :class="{'active':verifyIfIsActive(props.valeur.note)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.valeur.note-1)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.valeur.note-2)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.valeur.note-3)}"></div>
                        <div class="star" :class="{'active':verifyIfIsActive(props.valeur.note-4)}"></div>
                    </div>
                    <p>{{props.valeur.nb_vote}}</p>
                </div>
                <p>{{props.valeur.price}} fcfa</p>
                <button>
                    <span>Ajouter au panier</span>
                    <i class="fa fa-cart-shopping"></i>
                </button>
            </div>
        </div>
    </div>    
</template>


<script setup>
    import { onMounted, ref } from 'vue';

    const props = defineProps(['valeur','slug'])
    const img =props.valeur.image
    const myHeart = ref(false);
    let heartInput = ref(null);
    function pulseHeart(){
        myHeart.value = heartInput.value.checked;
    }


    function verifyIfIsActive(isOn){
        return isOn > 0;
    }

    function showProduct(){
        axios.get(`/api/show/89`)
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
        width: 150px;
        height: 200px;
    }

    .card .card-top .fa-heart{
        position: absolute;
        top: 20px;
        right: 20px;
        scale: 2;
        transition: 1s;
        animation-duration: 3s;
        animation-fill-mode: forwards;
        animation-timing-function: linear;
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

    .card .card-bottom button{
        position: absolute;
        background-color: grey;
        color: white;
        border-width: 0;
        padding: 10px;
        border-radius: 5px;
        right: 10px;
        background-color: #142C4C;
        transition: 200ms;
        cursor: pointer;
    }

    .card .card-bottom button:hover, .card .card-bottom button:hover .fa-cart-shopping{
        color: gold;
    }

    .card .card-bottom button:active{
        scale: 1.05;
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
            scale: 3.5;
            color: palevioletred;
        }
    
        30%{
            scale: 2;
            color: rgb(207, 3, 71);
        }
    
        60%{
            scale: 3.3;
            color: rgb(63, 21, 21);
        }
    
        80%{
            scale: 2;
            color: rgb(252, 43, 43);
        }
    
        100%{
            scale: 2;
            color: red;
        }
    }    
</style>