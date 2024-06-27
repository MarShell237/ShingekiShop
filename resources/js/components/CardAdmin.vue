<template>
    <div class="cards-accueil">
        <div class="card">
            <div class="card-top">
                <img :src="img" alt="">
            </div>
            
            <div class="card-bottom">
                <p class="card-description">{{props.valeur.name}}</p>
                <div class="note">
                    <div class="stars">
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                    </div>
                    <p>{{props.valeur.nb_vote}}</p>
                </div>
                <p>{{props.valeur.prix}} fcfa</p>
                <div class="buttons">
                    <a href="{{ route('admin.product.edit',$product) }}"><button>editer</button></a>
                    <button>supprimer</button>
                </div>
            </div>
        </div>
    </div>    
</template>


<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps(['valeur'])
const img = "./../../../public/storage/"+props.valeur.image

const myHeart = ref(true);

onMounted(()=>{
        const allStrars = document.querySelectorAll('.star');
        allStrars.forEach((star,num) => {
            if( 2 >= num) 
                star.classList.add('active') ;
    });    
})
    
    function pulseHeart(){
        const faHeart = document.getElementById('label'+props.valeur.id)
        console.log(faHeart);
        if(myHeart.value){
                faHeart.style.color='red';
            } else{
                faHeart.style.color='white';
            }
            myHeart.value = !myHeart.value
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

    .card .card-bottom .buttons{
        display: flex;
        justify-content: flex-end;
        column-gap: 10px;
    }

    .card .card-bottom button{
        border-width: 0;
        color: white;
        border-radius: 10px;
        font-size: large;
        width: 90px;
        height: 35px;
        cursor: pointer;
    }

    .card .card-bottom .buttons button:first-of-type{
        background-color: #32a2e1;
    }

    .card .card-bottom .buttons button:last-of-type{
        background-color: crimson;
        width: 130px;
    }

    .card .card-bottom button:active{
        scale: 1.05;
    }
</style>