const allStrars = document.querySelectorAll('.stare');
allStrars.forEach((star,num) => {
    star.addEventListener('click',()=>{
        allStrars.forEach((star2,num2) => {
            num >= num2 ? star2.classList.add('active') : star2.classList.remove('active');
        });    
    })
});