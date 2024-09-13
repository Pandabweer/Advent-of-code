const data = require("fs").readFileSync("_input.txt", "utf8");
let pos = 0;

console.log("Part 1:", (data.match(/\(/g) || []).length - (data.match(/\)/g) || []).length);

for (const [i, c] of data.split("").entries()) {
  if (pos == -1) {
    console.log(`Part 2: ${i}`);
    break;
  }

  pos += c == "(" ? 1 : -1
}
