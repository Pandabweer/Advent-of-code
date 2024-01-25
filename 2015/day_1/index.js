const data = require('fs').readFileSync('_input.txt', 'utf8');

console.log('Part 1:', (data.match(/\(/g)||[]).length - (data.match(/\)/g)||[]).length);

const array = data.split('');
var pos = 0

for (const [index, c] of array.entries()) {
    if (pos == -1) {
        console.log('Part 2:', index);
        break;
    }

    if (c == '(') {
        pos += 1;
    } else {
        pos -= 1;
    }
}
