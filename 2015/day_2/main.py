data = open("_input.txt").read()

wrapping, ribbon = 0, 0

for l, w, h in map(lambda x: map(int, x.split("x")), data.split("\n")):
    wrapping += 2 * (w * h + l * w + h * l) + min(w * h, l * w, h * l)
    ribbon += 2 * min(l + w, w + h, h + l) + l * w * h

print(f"Part 1: {wrapping}\nPart 2: {ribbon}")