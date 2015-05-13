//show how to use Indexof and splice.
var mathScores = [{name:'Emma',mathScore:84},{name:'Hailey',mathScore: 90},{name:'Isabella',mathScore: 91},{name:'Jada',mathScore: 65},{name:'Matilda',mathScore: 87},{name:'Maya',mathScore: 55},{name:'Olivia',mathScore: 72},{name:'Scarlett',mathScore: 98},{name:'Carter',mathScore: 95},{name:'Christopher',mathScore: 42}], 
    englisScores = [{name:'Christopher',englishScore: 92},{name:'Hailey',englishScore: 91},{name:'Maya',englishScore: 91},{name:'Jada',englishScore: 65},{name:'Matilda',englishScore: 87},{name:'Isabella',englishScore: 95},{name:'Olivia',englishScore: 72},{name:'Scarlett',englishScore: 68},{name:'Carter',englishScore: 93},{name:'Emma',englishScore:74},],
    topScorers = [], scoreLimit = 90;
    for(i=0;i<mathScores.length;i++){
    	if (mathScores[i].mathScore>=scoreLimit){
    		topScorers.push(mathScores[i].name);
    	}
    }
      	console.log(topScorers);
      	for(j=0;j<englisScores.length;j++){
      		var Index=topScorers.Indexof(englisScores[j].name);
      		if(englisScores[j].englishScore>=scoreLimit){

      		}
      	}