// Setting up Canvas
const canvas = document.querySelector("canvas");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
let c = canvas.getContext('2d');
window.addEventListener('resize', function(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    inIt();//Canvas initializer function call
})
//.....................
//mouse location finder
let mouse = {
    x: undefined,
    y: undefined
}
addEventListener("mousemove", function(event){
    mouse.x = event.x;
    mouse.y = event.y;
})
//.....................
// an Array of colors for circles
let colorArray = [
    [
    '#F2E530',
    '#8C862A',
    '#F2D335',
    '#D9D9D9',
    '#0D0D0D'
    ],
    [
        '',
        '',
        '',
        '',
        '',
    ]
   
]
//.....................
let maxRadius = 600; // maximum size of each circles
//Circle function constructor
function Circle(x, y, dx, dy, radius){
    this. radius = radius;
    this.minRadius = radius;
    this.x = x;
    this.y = y;
    this.dx = dx;
    this.dy = dy;
    this.color = Math.floor(Math.random() * colorArray.length);
}
//.....................
//added prototype to Circle function constructor. draw()
Circle.prototype.draw = function(){
        c.beginPath()
        c.arc(this.x, this.y, this.radius, 0, (Math.PI*2), false);
        c.fill()
        c.fillStyle = colorArray[0][this.color]
        //c.stroke();
        //c.strokeStyle = '#ffff00'
}
//.....................
//added prototype to Circle function constructor. update()
Circle.prototype.update = function(){
        this.x = this.x + this.dx;
        this.y = this.y + this.dy;

        if(this.x + this.radius > innerWidth || this.x - this.radius < 0){
            this.dx = -this.dx;
        }
        if(this.y + this.radius > innerHeight || this.y - this.radius < 0){
            this.dy  = -this.dy
        }
        //interactig stuff
        if(this.x - mouse.x < 50 && this.x - mouse.x > -50 && this.y - mouse.y < 50 && this.y - mouse.y > -50){
            if(this.radius < maxRadius){
                this.radius++
            }
        }else if(this.radius > this.minRadius){
            this.radius--;
        }

        this.draw();
}
//.....................
let circleArr = [];//Array to Collect Circle Objects
//creating Circle objects
function inIt(){
    circleArr = [];// this removes all the circle objects from circleArr
        let Amount = 832;//Amount of Circles
        for(let i = 0; i < Amount ; i++){
            let RADIUS = Math.random() * 15 +1;
            let X = Math.random() * (innerWidth - (RADIUS * 2)) + RADIUS;
            let Y = Math.random() * (innerHeight - (RADIUS * 2)) + RADIUS;
            let DX = (Math.random() - 0.5) * 2;
            let DY = (Math.random()  - 0.5) * 2;
            circleArr.push(new Circle(X, Y, DX, DY, RADIUS));//pushing all the circle objects 1 by 1 into circleArr
        }
}
//.....................
function animate(){
    requestAnimationFrame(animate);
    c.clearRect(0,0,innerWidth, innerHeight);
    for(let j = 0 ; j < circleArr.length; j++){
        circleArr[j].update();
    }
}
animate();
inIt();