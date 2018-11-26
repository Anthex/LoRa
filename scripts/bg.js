var particlesArray;
var particlesCount = 20;
var part;
var minDist, currentDist, minDistIndex;
var minDist2, minDistIndex2;

function setup() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('bg');
    background(0,0,0,0);  
  
  	particlesArray = new Array();
  	
  	for (var k=0; k<particlesCount; k++){
      part = new Particle(random(windowWidth), random(windowHeight));
      append(particlesArray, part);
    }
  	stroke(255,255,255,10);
  	fill(255,255,255,10);
	
} 

function draw() {
  clear();
	displayParticles();
  
	for (var k=0; k<particlesCount; k++){
      particlesArray[k].move();
    }
	
}

function Particle(x,y){
  this.x = x;
  this.y = y;
  
  this.move = function()
  {
    this.x = max(0,min(windowWidth,this.x + (random()-.5)*.5)) ;
    this.y = max(0,min(windowHeight,this.y + (random()-.5)*.5));
  }
}

function displayParticles(){
  for (var k=0; k<particlesCount; k++){
    
      ellipse(particlesArray[k].x,particlesArray[k].y, 5, 5);
    
    }
		
  for (var k=0; k<particlesCount; k++)
  {
     currentDist = dist(particlesArray[k].x,particlesArray[k].y,particlesArray[0].x,particlesArray[0].y);
     minDist = minDist2 = currentDist;
     minDistIndex = minDistIndex2 = 0;
     for (var i=1; i<particlesCount; i++)
     {
       currentDist = dist(particlesArray[k].x,particlesArray[k].y,particlesArray[i].x,particlesArray[i].y)
       
       if(currentDist<minDist && currentDist>0)
       {
           minDist2 = minDist;
           minDist = currentDist;
           minDistIndex2 = minDistIndex;
           minDistIndex = i;
         
       }
       else if(currentDist<minDist2 && currentDist>0){
         minDist2 = currentDist;
         minDistIndex2 = i;
       }
     }
    	line(particlesArray[k].x,particlesArray[k].y,particlesArray[minDistIndex].x,particlesArray[minDistIndex].y);
    	line(particlesArray[k].x,particlesArray[k].y,particlesArray[minDistIndex2].x,particlesArray[minDistIndex2].y);
    
    }
}