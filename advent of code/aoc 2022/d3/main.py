with open("inp.txt") as f:
    data = f.read().split("\n")

print(sum(((l:=len(r)//2,ord(*(set(r[:l])&set(r[l:])))-96)[1]%58 for r in data)))
print(sum([(ord(*(set(x)&set(y)&set(z)))-96)%58 for x,y,z in zip(*3*[iter(data)])]))
