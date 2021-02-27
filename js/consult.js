function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == "general"){
    var optionArray = ["|","ram|Dr Ram","priya|Dr Priya","rama|Dr Rama"];
  } else if(s1.value == "child"){
    var optionArray = ["|","rekha|Dr Rekha","anil|Dr Anil","rao|Dr Rao"];
  }else if(s1.value == "bone"){
    var optionArray = ["|","rekha|Dr Rekha","anil|Dr Anil","rao|Dr Rao"];
  }
   else if(s1.value == "heart"){
    var optionArray = ["|","vinay| Dr Vinay","prashant|Dr Prashant"];
  }
  else if(s1.value == "woman"){
    var optionArray = ["|","sirisha|Dr Sirisha","pooja|Dr Pooja"];
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
}

var skewed = document.querySelector('.skewed');
window.addEventListener('scroll',function(){
  var value = -10 + window.scrollY/60;
  skewed.style.transform = "skewY("+ value+" deg)"
})