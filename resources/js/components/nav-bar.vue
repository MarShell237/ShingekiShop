<template>
  <nav>
    <div class="nav-bar">
      <a href="/"><img src="./../../images/logo-removebg-preview (5).png" alt="" class="logo"></a>
      <div v-if="auth" class="localisation">
        <i class="fa fa-location-dot"></i>
        <span>Adresse de livraison:</span>
        <!-- <span>{{ Auth::user()->ville->name }}</span> -->
      </div>
      <div v-else class="localisation">
        <i class="fa fa-location-dot"></i>
        <span>L'adresse de livraison</span>
        <span>s'afficheras ici</span>
      </div>
      <form action="" method="GET">
          <div class="search-bar">
              <input type="search" placeholder="Rechercher..." name="searchValue">
              <i class="fa fa-search"></i>
          </div>
      </form>
      <div class="options">
          <a target="_blank" href="https://wa.me/237697815095" alt="notre whatsapp" title="Notre whatsapp"><i class="fa fa-phone"></i><span>service client</span></a>
      </div>
      <div class="options">
          <a href="{{route('client.article.index')}}">
              <i class="fa fa-book"></i>
              <span>blog</span>
          </a>
      </div>
          <div v-if="auth" class="options"  style="display: inline">
              <form action="{{ route('login') }}" method="POST" style="display: inline">
                  <button style="all:unset;display: inline-flex;flex-direction:column;align-items:center;">
                      <i class="fa fa-right-from-bracket"></i>
                      <span>deconnection</span>
                  </button>
              </form>
          </div>    
          <div v-else class="options">
              <a href="{{ route('login') }}"><i class="fa fa-circle-user"></i><span>connection</span></a>
          </div>    
      <div class="options">
      <a href="{{route('panier.index')}}" style="position: relative"> 
          <i class="fa fa-cart-shopping"></i>
          <span >panier</span>
          <nb-panier></nb-panier>
      </a>
      </div>
      </div>
          <div class="filter-bar">
              <a href="client/product/index"><button>Tout</button></a>
                  <a v-for="categorie in props.categories"  :href="'client/product/'+categorie.id"> 
                    <button>{{ categorie.name }}</button>
                  </a>
            </div>
  </nav>

</template>

<script setup>
  const auth = false;
  const props = defineProps(['categories'])

  // console.log(/props.categories);
</script>

<style scoped>
@import url('./../../css/all.min.css');

/* nav bar */
nav{
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}


.nav-bar,.filter-bar{
  width: 90vw;
  height: 90px;
  background: linear-gradient(rgba(255, 255, 255,0.1),rgba(255,255,255,0.2));
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255,0.18);
  box-shadow: 0 80x 32px 0 rgba(255, 255, 255,0.37);
  display: flex;
  justify-content: space-around;
  align-items: center;
  border-radius: 16px;
  font-family: Abel;
}

.nav-bar{
  position: fixed;
  top: 8px;
  z-index: 1000;
  border-bottom-color:transparent;
}

.filter-bar{
  margin-top: 90px;
  font-family: Abel;
}

.logo{
  width: 120px;
  height: 52px;
}

.fa,.nav-bar span{
  color: white;
}

.nav-bar div{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.localisation{
  background-color: rgb(255, 255, 255,0.2);
  border-radius: 10px;
  height: 80%;
  transition: 200ms;
  padding: 0 5px;
  cursor: context-menu;
}

.nav-bar form{
  margin-top: 14px;
  width: 45%;
}

.nav-bar .search-bar{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid rgb(255, 255, 255,0.12);
}

.search-bar i{
  display: block;
}

.search-bar input{
  all: unset;
  color: white;
  padding: 5px;
  width: 95%;
}

.nav-bar a{
  display: inline-flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
}

.options{
  transition: 200ms;
}

.options:hover ,.localisation:hover{
  scale: 1.2;
  opacity: 0.8;
}

/* filter bar */
.filter-bar{
  height: 60px;
  border-top-color: transparent;
}

.filter-bar button{
  width: 150px;
  height: 40px;
  border-radius: 30px;
  color: white;
  background: linear-gradient(rgba(255, 255, 255,0.1),rgba(255,255,255,0.2));
  border-width: 0;
  transition: 200ms;
  cursor: pointer;
  will-change: scale;
}
.filter-bar button:hover{
  scale: 1.05;
  opacity: 0.8;
}

.filter-bar button:active{
  scale: 1;
}
</style>