with open("inp.txt", "r") as f:
    inp = f.read()

parsed_data = sorted(map(lambda s: sum(s), map(lambda x: map(int, x.split("\n")), inp.split("\n\n"))))

print(parsed_data[-1])
print(sum(parsed_data[-3:]))