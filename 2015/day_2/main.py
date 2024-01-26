data = open("_input.txt").read()

wrapping = 0
ribbon = 0

for d in data.split("\n"):
    l, w, h = map(int, d.split("x"))
    sort = sorted([l, w, h])

    wrapping += 2*(w*h + l*w + h*l) + min(w*h, l*w, h*l)
    ribbon += 2*(sort[1] + sort[0]) + l*w*h

print(f"Part 1: {wrapping}\nPart 2: {ribbon}")