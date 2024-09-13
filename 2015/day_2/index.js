const data = require("fs").readFileSync("_input.txt", "utf8");
let [wrapping, ribbon] = [0, 0];

data.split("\n").map(e => e.split("x").map(Number)).forEach(([l, w, h]) => {
  wrapping += 2 * (w * h + l * w + h * l) + Math.min(w * h, l * w, h * l);
  ribbon += 2 * Math.min(l + w, w + h, h + l) + l * w * h;
})

console.log(`Part 1: ${wrapping}\nPart 2: ${ribbon}`);