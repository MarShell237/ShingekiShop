const checkbox = document.getElementById('checkbox')
const faHeart = document.getElementById('fa-heart')

console.log(checkbox);
faHeart.addEventListener('click',()=>{
    if(checkbox.checked){
        // faHeart.style.color = 'red';
        faHeart.style.animationName = 'pulse'; 
    } else{
        faHeart.style.color='white';
        faHeart.style.animationName = 'initial'; 
    }
})