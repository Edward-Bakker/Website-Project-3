const canvas = document.getElementById('canvas');
const button = document.getElementById('fireworkButton');
const ctx = canvas.getContext('2d');

canvas.width = innerWidth;
canvas.height = innerHeight;

const cx = innerWidth / 2;
const cy = innerHeight / 2;

const projectiles = [];
const particles = [];

let fireworkOn = false;

button.addEventListener('click', () => {
    if(!fireworkOn){
        ctx.fillStyle = 'rgb(0,0,0)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        startFirework();
        canvas.style.opacity = '0.9';
        canvas.style.zIndex = 100;
    }
});

const animate = () => {
    window.requestAnimationFrame(animate);
    ctx.fillStyle = 'rgba(0,0,0,0.1)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    particles.forEach((particle, index) => {
        particle.update(ctx);
        if(particle.opacity <= 0){
            particles.splice(index, 1);
        }
    });
}

animate();

const startFirework = () => {
    let remainingTime = 3;
    fireworkOn = true;
    let fireworkInterval = setInterval(() => {

        let particleAmount = 10 + Math.floor(Math.random() * 41);
        const particleX = cx - 200 + Math.random() * 400;
        const particleY = cy - 200 + Math.random() * 300;
        for(let i=0; i<particleAmount; i++){
            const color = `hsl(${Math.round(Math.random() * 360)}, 50%, 50%)`;
            const particleR = 2 + Math.floor(Math.random() * 6);
            const particleVXDir = Math.random() < 0.5 ? Math.random() : Math.random() * -1;
            const particleVYDir = Math.random() < 0.5 ? Math.random() : Math.random() * -1;
            const particleVX = particleVXDir * (2 + Math.random() * (5 - 2));
            const particleVY = particleVYDir * (2 + Math.random() * (5 - 2));
            const particle = new Particle(particleX, particleY, particleR, color, particleVX, particleVY);
            particles.push(particle);
        }

        remainingTime -= 0.5;

        if(remainingTime <= 0){
            clearInterval(fireworkInterval);
            fireworkOn = false;
            canvas.style.opacity = 0;
            canvas.style.zIndex = -1;
        }
    }, 500)
}


class Projectile{
    constructor(x, y, r, c, vx, vy) {
        this.x = x;
        this.y = y;
        this.r = r;
        this.c = c;
        this.vx = vx;
        this.vy = vy;
    }

    draw(ctx) {
        ctx.beginPath();
        ctx.fillStyle = this.c;
        ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
        ctx.fill();
    }

    update(ctx) {
        this.draw(ctx);
        this.x += this.vx;
        this.y += this.vy;
    }
}

class Particle extends Projectile{
    constructor(x, y, r, c, vx, vy) {
        super(x, y, r, c, vx, vy);
        this.opacity = 1;
        this.friction = 0.99;
    }

    draw(ctx) {
        ctx.save();
        ctx.globalAlpha = this.opacity;
        ctx.beginPath();
        ctx.fillStyle = this.c;
        ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
        ctx.fill();
        ctx.restore();
    }

    update(ctx) {
        this.draw(ctx);
        this.x += this.vx;
        this.y += this.vy;
        this.vx *= this.friction;
        this.vy *= this.friction;
        this.opacity -= 0.01;
    }
}