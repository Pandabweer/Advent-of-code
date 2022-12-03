with open("inp.txt") as f:
    data = f.read().split("\n")

print(sum([ord(x) - 96 if x.islower() else ord(x) - 38 for r in data for x in set(r[:int(len(r) / 2)]) if x in set(r[int(len(r) / 2): len(r)])]))
print(sum(map(lambda c: (r:=[h for h in c[0] if h in c[1] and h in c[2]][0], ord(r) - 96 if r.islower() else ord(r) - 38)[1], [data[i:i + 3] for i in range(0, len(data), 3)])))

