const data = require("fs").readFileSync("_input.txt", "utf8");
let [santaPos, roboPos, santaPosOld] = [
  [0, 0],
  [0, 0],
  [0, 0],
];

const santaOldHouses = new Set([santaPosOld.toString()]);
const santaHouses = new Set([santaPos.toString()]);
const roboHouses = new Set([roboPos.toString()]);

const directions = { "^": [0, 1], v: [0, -1], ">": [1, 0], "<": [-1, 0] };

data.split("").forEach((ins, i) => {
  const move = directions[ins];
  santaPosOld = [santaPosOld[0] + move[0], santaPosOld[1] + move[1]];
  santaOldHouses.add(santaPosOld.toString());

  if (i % 2) {
    roboPos = [roboPos[0] + move[0], roboPos[1] + move[1]];
    roboHouses.add(roboPos.toString());
  } else {
    santaPos = [santaPos[0] + move[0], santaPos[1] + move[1]];
    santaHouses.add(santaPos.toString());
  }
});

console.log(
  `Part 1: ${santaOldHouses.size}\nPart 2: ${new Set([...santaHouses, ...roboHouses]).size}`,
);
