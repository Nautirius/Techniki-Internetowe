document.getElementById("draw-button").addEventListener("click", () => {
    const vertices = [];
    for (let i = 1; i <= 4; i++) {
        let x = parseFloat(document.getElementById(`input-x-${i}`).value);
        let y = parseFloat(document.getElementById(`input-y-${i}`).value);
        if (isNaN(x) || isNaN(y) || x < 0 || x > 200 || y < 0 || y > 200) {
            alert("Wszystkie wspolrzedne musza byc liczbami w przedziale 0-200.");
            return;
        }
        vertices.push({ x, y });
    }

    drawCanvas(vertices);
    drawSVG(vertices);
    calculatePerimeter(vertices);
});

function drawCanvas(vertices) {
    let canvas = document.getElementById("canvas");
    let ctx = canvas.getContext("2d");

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    vertices.forEach((v, i) => {
        if (i === 0) {
            ctx.moveTo(v.x, v.y);
        } else {
            ctx.lineTo(v.x, v.y);
        }
    });
    ctx.closePath();
    ctx.strokeStyle = "blue";
    ctx.lineWidth = 2;
    ctx.stroke();
    ctx.fillStyle = "rgba(0, 0, 255, 0.1)";
    ctx.fill();
}

function drawSVG(vertices) {
    let svg = document.getElementById("svg");
    svg.innerHTML = "";

    let polygon = document.createElementNS("http://www.w3.org/2000/svg", "polygon");
    let points = vertices.map(v => `${v.x},${v.y}`).join(" ");
    polygon.setAttribute("points", points);
    polygon.setAttribute("stroke", "blue");
    polygon.setAttribute("fill", "rgba(0, 0, 255, 0.1)");
    polygon.setAttribute("stroke-width", "2");
    svg.appendChild(polygon);
}

function calculatePerimeter(vertices) {
    let perimeter = 0;
    for (let i = 0; i < vertices.length; i++) {
        let nextIndex = (i + 1) % vertices.length;
        let dx = vertices[nextIndex].x - vertices[i].x;
        let dy = vertices[nextIndex].y - vertices[i].y;
        perimeter += Math.sqrt(dx * dx + dy * dy);
    }
    document.getElementById("perimeter").textContent = `Obwod czworokata: ${perimeter.toFixed(2)}`;
}

