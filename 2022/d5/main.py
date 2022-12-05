with open("inp.txt") as f:
    inp = f.read()

x, y = inp.split("\n\n")

crates = [list(filter(lambda h: h != " ", k)) for k in list(zip(*8*[iter([z[1] for y in zip(*zip(*9*[iter(zip(*4*[iter(x)]))])) for z in y])]))]
c2 = crates.copy()

import re

for ins in y.split("\n"):
    move, frm, to = map(int, re.findall(r"\d+", ins))

    crates[to-1] = crates[frm-1][:move][::-1] + crates[to-1]
    crates[frm-1] = crates[frm-1][move:]

    c2[to-1] = c2[frm-1][:move] + c2[to-1]
    c2[frm-1] = c2[frm-1][move:]

    


print("".join([x[0] for x in crates]))
print("".join([x[0] for x in c2]))


