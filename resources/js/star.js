const allStrars = document.querySelectorAll('.star-2');
allStrars.forEach((star,num) => {
  star.addEventListener('click',()=>{
    allStrars.forEach((star2,num2) => {
            num >= num2 ? star2.classList.add('active') : star2.classList.remove('active');
        });    
    })
});