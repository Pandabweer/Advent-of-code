const data = require("fs").readFileSync("_input.txt", "utf8");
let [wrapping, ribbon] = [0, 0];

data.split("\n").forEach((element) => {
  let [l, w, h] = element.split("x").map(Number);

  wrapping += 2 * (w * h + l * w + h * l) + Math.min(w * h, l * w, h * l);
  ribbon += Math.min(2 * (l + w), 2 * (w + h), 2 * (h + l)) + l * w * h;
});

console.log(`Part 1: ${wrapping}\nPart 2: ${ribbon}`);
