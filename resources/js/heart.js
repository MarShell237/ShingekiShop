const heart = document.getElementById('heart')
const faHeart = document.getElementById('fa-heart')

faHeart.addEventListener('click',()=>{
    if(heart.checked){
        // faHeart.style.color = 'red';
        faHeart.style.animationName = 'pulse'; 
    } else{
        faHeart.style.color='white';
        faHeart.style.animationName = 'initial'; 
    }
})