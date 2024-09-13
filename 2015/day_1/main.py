data = open("_input.txt").read()
pos = 0

print("Part 1:", data.count("(") - data.count(")"))

for i, x in enumerate(data):
    if pos == -1:
        print(f"Part 2: {i}")
        break

    pos += 1 if x == "(" else -1
