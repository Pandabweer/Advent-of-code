data = open("input.txt").read()

print(data.count("(") - data.count(")"))