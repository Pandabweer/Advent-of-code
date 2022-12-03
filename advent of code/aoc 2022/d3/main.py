with open("inp.txt") as f:
    data = f.read().split("\n")

print(sum(((l:=len(r)//2,ord(*(set(r[:l])&set(r[l:])))-96)[1]%58 for r in data)))
print(sum([(ord(*(set(x[0])&set(x[1])&set(x[2])))-96)%58 for x in [data[i:i+3] for i in range(0, len(data), 3)]]))
