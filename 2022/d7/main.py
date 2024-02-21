stack = []
d = []

for line in open("inp.txt"):
    if line == "$ cd ..\n":
        value = stack.pop()
        stack[-1] += value
        d += [value]
    elif line.startswith("$ cd "):
        stack += [0]
    elif line[0].isdigit():
        stack[-1] += int(line.split()[0])

print(sum(x * (1e5 > x) for x in d), min(x for x in d if x > sum(stack) - 4e7))
