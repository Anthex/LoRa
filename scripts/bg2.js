var particlesArray;
var particlesCount = 100;
var part;
var minDist, currentDist, minDistIndex;
var minDist2, minDistIndex2;
var noises = 0.0;

var dimX, dimY;

function setup() {
    dimX = windowWidth;
  	dimY = windowHeight
  	var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('bg');
    background(0,0,0,0);  
  
  	particlesArray = new Array();
  	
  	for (var k=0; k<particlesCount; k++){
      part = new Particle(random(dimX), random(dimY));
      append(particlesArray, part);
    }
  	stroke(150);
  fill(50,50,200);
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
    noises+=.1;
    this.x = max(0,min(dimX,this.x + (noise(noises)-.5)*1 - mouseIsPressed*(mouseX-this.x)*10000/(pow(dist(mouseX, mouseY, this.x, this.y),3)))) ;
    noises+=.1;
    this.y = max(0,min(dimY,this.y + (noise(noises)-.5)*1 - mouseIsPressed*(mouseY-this.y)*10000/(pow(dist(mouseX, mouseY, this.x, this.y),3))));
  }
}

function displayParticles(){
  
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
    	stroke(255,255,255,100-dist(particlesArray[k].x,particlesArray[k].y,mouseX,mouseY));
    	line(particlesArray[k].x,particlesArray[k].y,particlesArray[minDistIndex].x,particlesArray[minDistIndex].y);
    	line(particlesArray[k].x,particlesArray[k].y,particlesArray[minDistIndex2].x,particlesArray[minDistIndex2].y);
    
    }
}