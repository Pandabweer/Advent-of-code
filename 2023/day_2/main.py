data = open("_input.txt").read()
one, two = 0, 0

for line in data.split("\n"):
    t = {"bad": False, "r": 0, "g": 0, "b": 0}
    for game in line.split(":")[1].split(";"):
        for n, c in [(f := x.split(), int(f[0]), f[1][0])[1:] for x in game.split(",")]:
            if t[c] < n:
                t[c] = n
            if n > {"r": 12, "g": 13, "b": 14}[c]:
                t["bad"] = True
    two += t["r"] * t["g"] * t["b"]

    if not t["bad"]:
        one += int(line.split(":")[0].split()[1])

print(one, two)
