const previousButton = document.getElementById("previous")
const nextButton = document.getElementById("next")
const submitButton = document.getElementById('validate')
const form = document.getElementById('stepByStepForm')
const dots = document.getElementsByClassName('progress-bar__dot')
const numberOfSteps = 6
let currentStep = 1;

for(let i = 0 ; i < dots.length ; ++i){
   dots[i].addEventListener('click', ()=>{
     goToStep(i+1) 
   })
}

previousButton.addEventListener('click', goPrevious)
nextButton.addEventListener('click', goNext )

function goNext(e) {
   e.preventDefault()
   currentStep += 1
   goToStep(currentStep)
}

function goPrevious(e) {
   e.preventDefault()
   currentStep -= 1
   goToStep(currentStep)
}

function goToStep(stepNumber){   
   currentStep = stepNumber
   
   let inputsToHide = document.getElementsByClassName('step')
   let inputs = document.getElementsByClassName(`step${currentStep}`)
   let indicators = document.getElementsByClassName('progress-bar__dot')
   
   for(let i = indicators.length-1; i >= currentStep ; --i){
      indicators[i].classList.remove('full')
      if(i!==0){
        indicators[i].classList.remove('active')
      }
   }
   
   for(let i = 0; i < currentStep; ++i){
      indicators[i].classList.add('full')
      indicators[i].classList.add('active')
   }
   
   //hide all input
   for (let i = 0; i < inputsToHide.length; ++i) {
      hide(inputsToHide[i])
   }
   
   //only show the right one
   for (let i = 0; i < inputs.length; ++i) {
      show(inputs[i])
   }
   
   //if we reached final step
   if(currentStep === numberOfSteps){
      enable(previousButton)
      disable(nextButton)
     hide(nextButton)
      show(submitButton)
   }
   
   //else if first step
   else if(currentStep === 1){
     disable(previousButton)
     hide(previousButton)
      enable(next)
      hide(submitButton)
   }
   
   else {
      enable(previousButton)
      show(previousButton)
      enable(next)
      show(nextButton)
      hide(submitButton)
   }
}

function enable(elem) {
   elem.classList.remove("disabled");
   elem.disabled = false;
}

function disable(elem) {
   elem.classList.add("disabled");
   elem.disabled = true;
}

function show(elem){
   elem.classList.remove('hidden')
}

function hide(elem){
   elem.classList.add('hidden')
}